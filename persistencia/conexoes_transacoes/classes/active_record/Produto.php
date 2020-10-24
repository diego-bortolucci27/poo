<?php
/*
O Design Pattern Active Record é como se fosse um "Row Data Gateway- RDG", porém acrescido de métodos de negócio. A diferença primordial é que RDG não apresenta método pertencente ao modelo de negócios, somente métodos de acesso À base de dados. Quando adicionamos lógica de negócio, ou seja, métodos que tratam de implementar características do modelo de negócio a um Row Data Gateway, temos um Active Record, podendo ser utilizado com o modelo de dados. Os Design Pattern TDG e RDG, proviam uma camada de acesso ao banco de dados para a camada superior (modelo de domínio). Com o Active Record temos uma única camada, na qual temos a lógica de negócios (modelo de domínio) e métodos de persistencia do objeto na base de dados (Gateway). Um Active Record deve prover o mesmo que um Row Data Gateway, além de implementar mátodos do modelo de domínio (lógica de negócios).
Nesse programa, como estamos utilizando Active Record, incluimos métodos relativos ao modelo de negócios, como os métodos getMargemLucro() e registraCompra(). A presença desses métodos em uma classe que era um Row Data Gateway, torna essa clase um Active Record, ou seja, o objeto se comporta exatamente como um registro do BD e ainda oferece métodos relativos à lógica de negócios da aplicação.
*/
	class Produto{
		private static $conn;
		private $data;

		function __get($prop){
			return $this->data[$prop];
		}

		function __set($prop, $value){
			$this->data[$prop] = $value;
		}

		public static function setConnection(PDO $conn){
			self::$conn = $conn;
		}

		public static function find($id){
			$sql = "SELECT * FROM produto where id = '$id' ";
			print "$sql <br>";
			$result = self::$conn->query($sql);
			return $result->fetchObject(__CLASS__);
		}

		public static function all($filter = ''){
			$sql = "SELECT * FROM produto ";
			if ($filter){
				$sql .= " where $filter";
			}
			print "$sql<br>";
			$result = self::$conn->query($sql);
			return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
		}

		public function delete(){
			$sql = "DELETE FROM produto WHERE id = '{$this->id}' ";
			print "$sql <br>";
			return self::$conn->query($sql);
		}

		public function save(){
			if(empty($this->data['id'])){
				$id = $this->getLastId() + 1;
				$sql = "INSERT INTO produto (id, descricao, estoque, preco_custo, preco_venda, codigo_barras, data_cadastro, origem) VALUES (
				'{$id}', " .
				"'{$this->descricao}', " .
				"'{$this->estoque}', " .
				"'{$this->preco_custo}', " .
				"'{$this->preco_venda}', " .
				"'{$this->codigo_barras}', " .
				"'{$this->data_cadastro}', " .
				"'{$this->origem}')";
			}else{
				$sql = "UPDATE produto SET descricao = '{$this->descricao}', " .
								" estoque = '{$this->estoque}', " .
								" preco_custo = '{$this->preco_custo}', " .
								" preco_venda = '{$this->preco_venda}', " .
								" codigo_barras = '{$this->codigo_barras}', " .
								" data_cadastro = '{$this->data_cadastro}', " .
								" origem = '{$this->origem}' " .
								" WHERE id = '{$this->id}'";
			}
			print "$sql <br>";
			return self::$conn->exec($sql); //executa a instruçao SQL
		}//fecha o metodo save

		private function getLastId(){
			$sql = "SELECT max(id) as max FROM produto";
			$result = self::$conn->query($sql); //executa o select e retorna os dados em $result
			$data = $result->fetch(PDO::FETCH_OBJ);
			return $data->max;
		}

		public function getMargemLucro(){
			return (($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
		}

		public function registraCompra($custo, $quantidade){
			$this->custo = $custo;
			$this->estoque += $quantidade;
		}
	}
	
?>