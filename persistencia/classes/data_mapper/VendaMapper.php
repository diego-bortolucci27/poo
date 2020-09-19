<?php

	/*
		A classe VendaMapper é responsável por receber uma estrutura com relacionamento entre os objetos e persisti-la na base de dados. A classe VendaMapper terá um método setConnection() para receber uma conexão PDO criada externamente. Terá também um método privado getLastId() para descobrir o último ID inserido. E terá o método save(), que receberá como parâmetro uma venda (instância de venda), e irá gravar os dados necessários tanto na tabela venda quanto em item_venda. Para descobrir quais são os itens da venda, classe VendaMapper utiliza o método getItens().
	*/

	class VendaMapper
	{
		private static $conn;

		public static function setConnection(PDO $conn)
		{
			self::$conn;
		}

		public static function save(Venda $venda)
		{
			$date = date("Y-m-d");
			$sql = "INSERT INTO venda (data_venda) VALUES ('$date')";
			print $sql . '<br>';
			self::$conn->query($sql);
			$id = self::getLastId();
			$venda->setId($id);
			//percorre os itens vendidos
			foreach ($venda->getItens() as $item)
			{
				$quantidade = $item[0];
				$produto = $item[1];
				$preco = $produto->preco;

				$sql = "INSERT INTO item_venda (id_venda, id_produto, quantidade, preco)" . 
				" values ('$id', '{$produto->id}', '$quantidade', '$preco')";
				print $sql . '<br>';
				self::$conn->query($sql);
			}
		}

		private static function getLastId()
		{
			$sql = "SELECT max(id) as max FROM venda";
			$result = self::$conn->query($sql);
			$data = $result->fetch(PDO::FETCH_OBJ);
			return 
		}
	}
?>