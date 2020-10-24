<?php
/*
	Com o mecanismo de log definido e criado, como utiliza-lo? A resposta é: de qualquer ponto da aplicação. Para tal, basta termos uma transação aberta. Lembre-se que da classe Active Record Produto que defirmos anteriomente. Nela, tinhamos uma instrução de print para exibir o SQL em tela para nosso controle. Pois naquele ponto podemos agora substituir a instrução de print pela utilização de logs. Como naquele ponto temos uma transção aberta, iremos simplesmente executar o método log(). Quando houver um log definido, a instrução será escrita no arquivo de log, caso contrário, nada acontecerá. Veja na classe a seguir, onde, no método save(), substituímos o comentário pelo método de log.
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
			$conn = Transaction::get();//usa transação
			$result = $conn->query($sql);//conectado ao bd, executa sql no bd
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
				$id = $this->getLastId() +1;
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
			
			$conn = Transaction::get();//uso de transação
			print "$sql <br>";
			Transaction::log($sql);
			//$result = $conn->exec($sql); //executa a instruçao SQL isso gerava erro na execução do projeto anterior (data mapper)

			//o correto já é retornar a execução do comando
			return $conn->exec($sql);//EXECUTA A INSTRUÇÃO
		}//fecha o metodo save

		private function getLastId(){
			$sql = "SELECT max(id) as max FROM produto";
			$conn = Transaction::get();//uso de transação
			$result = $conn->query($sql); //executa a instruçao SQL
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