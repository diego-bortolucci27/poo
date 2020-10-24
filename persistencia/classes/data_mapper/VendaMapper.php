<?php
/*
A classe VendaMapper é responsável por receber uma estrutura com relacionamentos entre os objetos e persisti-la na base de dados. A classe VendaMapper terá um método setConnection() para receber uma conexão PDO criada externamente. Terá também um método privado getLastId() para descobrir o último ID iserido. E terá o método save(), que receberá como parametro uma venda (instância de Venda), e irá gravar os dados necessários tanto na tabela venda quanto na tabela item_venda. Para descobrir quais são os itens da venda, a classe VendaMapper utiliza o método getItens().
*/
	class VendaMapper{
		private static $conn;

		public static function setConnection(PDO $conn){
			self::$conn = $conn;
		}
		//aplicação do design pattern Data Mapper
		public static function save(Venda $venda){
			$date = date("Y-m-d");			
			$id = self::getLastId() + 1; //alterado para incrementar o id em 1
			$venda->setId($id);	
			//print $venda->getId();
			$sql = "INSERT INTO venda (id, data_venda) values ('$id', '$date')";
			print $sql;
			self::$conn->query($sql);
			
			//percorre os ites vendidos
			foreach ($venda->getItens() as $item) {
				$quantidade = $item[0];
				$produto = $item[1];
				$preco = $produto->preco;
				$sql = "INSERT INTO item_venda (id_venda, id_produto, quantidade, preco)" .
				" values ('$id', '{$produto->id}', '$quantidade', '$preco')";
				print $sql . "<br>";
				self::$conn->query($sql);
			}
		}

		public static function getLastId(){
			$sql = "SELECT max(id) as max FROM venda";
			$result = self::$conn->query($sql);
			$data = $result->fetch(PDO::FETCH_OBJ);
			return $data->max;
		}
	}
	 
?>