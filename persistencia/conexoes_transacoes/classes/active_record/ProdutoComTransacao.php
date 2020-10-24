<?php
/*
Agora vamos criar uma nova versão da classe Active Record Produto, já que temos nossa classe de controle de transações pronta (Transaction do arquivo Transaction.php), vamos usar seu método get(), para retornar a conexão ativa e realizar operações na nova classe de Produto. 
A primeira versão da classe Active Record Produto possui um método setConnection() para passar a conexão criada externamente por meio de um método. O método setConnection recebia a conexão e armazenava internamente no objeto Active Record. Não precisamos mais nos preocupar em ficar passando a conexão adiante, pois, com o novo modelo de transações, sempre que uma conexão é necessária basta executarmos o método Transaction::get() de qualquer lugar do programa que esse método retornará a conexão da transação ativa. Para tal, basta que exista uma transação aberta (Transaction::open()) anteriormente. Dessa forma, escrevemos uma nova classe Active Record Produto, agora sem o método setConnection(). Sempre que a conexão corrente é necessária, como nos métodos find() e save(), executamos Transaction::get() para obter a conexão da transação ativa.
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
			print "$sql<br>";
			//$result = self::$conn->query($sql); agora vms usar transação
			//fazendo com transação, temos as linhas 24 e 25
			//retorna a conexao com bd ativa no momento
			$conn = Transaction::get();
			$result = $conn->query($sql);
			return $result->fetchObject(__CLASS__);
		}

		public static function all($filter = ''){
			$sql = "SELECT * FROM produto ";
			if($filter){
				$sql .= " where $filter";
			}
			print "$sql <br>";
			$result = self::$conn->query($sql);
			return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
		}

		public function delete(){
			$sql = "delete from produto where id = '{$this->id}' ";
			print "$sql <br>";
			return self::$conn->query($sql);
		}

		public function save(){
			if (empty($this->data['id'])){
				$id = $this->getLastId() +1;
				$sql = "INSERT INTO produto (id, descricao, estoque, preco_custo, preco_venda, codigo_barras, data_cadastro, origem) values ('{$id}', " .
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
							  	" data cadastro = '{$this->data_cadastro}', " .
								" orgiem = '{$this->origem}')" .
								" where id = '{$this->id}'"; 
			}
			print "$sql <br>";
			//return self::$conn->exec($sql); vms substituir pelas prox 2 linhas para usar transação
			$conn = Transaction::get();
			return $conn->exec($sql); //executa a instrução sql com controle de transacao
		}

		private function getLastId(){
			$sql = "SELECT max(id) as max FROM produto";
			//$result = self::$conn->query($sql); vamos usar controle de transacao, assim essa linha será trocada pelas linhas 79 e 80
			$conn = Transaction::get();
			$result = $conn->query($sql);
			$data = $result->fetch(PDO::FETCH_OBJ);
			return $data->max;
		}
		
		//métodos para regra de negócio
		public function getMargemLucro(){
			return (($this->preco_venda - $this->preco_custo) / $this->preco_custo) *100;
		}
		public function registraCompra($custo, $quantidade){
			$this->custo = $custo;
			$this->estoque += $quantidade ;
		}
	}
?>