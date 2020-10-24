<?php
	/*
	No Design Pattern Table Data Gateway, existe uma classe para manipulação de cada tabela do BD, e apenas uma instancia dessa classe irá manipular todos registros da tabela, por isso é necessário sempre identificar o registro sobre o qual o método estará operando. Uma classe Table Data Gateway é por naturaza stateless, ou seja, não mantém o estado de suas propriedades; atua simplesmente como ponte entre o objeto de negócios e o banco de dados.

	No programa a seguir estamos criando a classe ProdutoGateway. Essa classe, que implementa o Design Pattern Table Data Gateway, contém métodos para gravação (save), exclusão (delete) e busca (find, all) de registros em base de dados. Antes de mais nada, é preciso criar um método para receber a conexão ativa (setConnection). Esse método implementa uma injeção de dependência, pois os demais métodos da classe utilizarão a conexão recebida (self::$conn) para realizar as operações com BD.

	O método find() recebe o ID do registro como parametro, executa uma query simples para buscá-lo no BD e retorna esse registro na forma de objeto, por meio do método fetchObject().

	O método all() recebe opcionalmente como parametro um filtro e por sua vez monta uma query para retornar todos os registros do banco de dados na forma de um array de objetos, por meio método fetchAll().

	O método delete() recebe o ID do registro como parametro e simplesmente executa uma query para sua exclusão. Veja que vários exemplos contêm instruções de print para debug. Em um cenário real, esses prints não estariam presentes.

	O método save() é responsável pela gravação de dados. Para tal, ele recebe um parametro ($data), que se trata de um objeto de transporte de dados, um Data Transfer Object, um objeto simples, sem relacionamento como associações, agregações ou heranças, utilizado apenas como estrutura para o transporte de dados entre uma chamada de métodos e outra. Geralmente esses objetos são pequenos e permitem transportar vários dados por meio de suas propriedades. Como geralmente não persistimos todo objeto do modelo conceitual, mas apenas algumas de suas propriedades. Como geralmente não persistimos todo objeto do modelo conceitual, mas apenas algumas de suas propriedades, os Data Transfer Objects são uma boa escolha quando se implementa o Design Pattern Table Data Gateway. Vocês perceberão a simplificação que ocorre nas chamadas de métodos. O método save() tem uma dupla função: inserir um registro novo (caso o objeto recebido não tenha um ID) ou alterar os dados de um registro (caso o objeto recebido já tenha um ID).

	Observar que a cada método executado, é necessário fazer a identificação do registro sobre o qual o método irá operar. Algumas vezes essa identidicação é realizada pelo ID dos registros, como na operação de exclusão (delete), outras vezes é necessário informar o registro completo, como na operação de gravação (save) que por sua vez recebe um objeto cuja função é simplesmente transportar os dados.
	*/

	class ProdutoGateway{
		private static $conn;

		public static function setConnection(PDO $conn){
			self::$conn = $conn;
		}

		public function find($id, $class = 'stdClass'){
			$sql = "SELECT * FROM produto where id = '$id' ";
			print "$sql <br>";
			$result = self::$conn->query($sql);
			return $result->fetchObject($class);
		}

		public function all($filter, $class = 'stdClass'){
			$sql = "SELECT * FROM produto ";
			if ($filter){
				$sql .= " where $filter";
			}
			print "$sql<br>";
			$result = self::$conn->query($sql);
			return $result->fetchAll(PDO::FETCH_CLASS, $class);
		}

		public function delete($id){
			$sql = "DELETE FROM produto WHERE id = '$id' ";
			print "$sql <br>";
			return self::$conn->query($sql);
		}

		public function save($data){
			if(empty($data->id)){
				$id = $this->getLastId() + 1;
				$sql = "INSERT INTO produto (id, descricao, estoque, preco_custo, preco_venda, codigo_barras, data_cadastro, origem) VALUES (
				'{$id}', " .
				"'{$data->descricao}', " .
				"'{$data->estoque}', " .
				"'{$data->preco_custo}', " .
				"'{$data->preco_venda}', " .
				"'{$data->codigo_barras}', " .
				"'{$data->data_cadastro}', " .
				"'{$data->origem}')";
			}else{
				$sql = "UPDATE produto SET descricao = '{$data->descricao}', " .
								" estoque = '{$data->estoque}', " .
								" preco_custo = '{$data->preco_custo}', " .
								" preco_venda = '{$data->preco_venda}', " .
								" codigo_barras = '{$data->codigo_barras}', " .
								" data_cadastro = '{$data->data_cadastro}', " .
								" origem = '{$data->origem}' " .
								" WHERE id = '{$data->id}'";
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
	}
?>