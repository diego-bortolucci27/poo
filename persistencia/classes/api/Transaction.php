<?php
	/*
	Para que a classe Transaction utilize um dos algoritmos de log, é necessário que ela tenha uma referencia para um objeto do tipo Logger. Para isso, é necessário criarmos o método setLogger() na transação, que irá receber uma instância de alguma classe concreta de Logger e irá armazenar essa instancia na propriedade $logger para que seja utilizada posteriormente no momento do log. Assim, a transação terá uma referencia para o algoritmo de log que deve ser usado quando necessário.
	Para registrar uma mensagem de log, será necessário criar um método log(). O papel desse método será acionar o algoritmo de log definido, passando uma mensagem qualquer para ser registrada, como uma instrução SQL, por exemplo. Como o objeto Transction terá uma referencia para um objeto concreto do tipo Logger, por meio da propriedade (atributo) $logger, a responsabilidade pela execução do log será delegada a ele por meio da execução do método write(). Sempre que uma transação é iniciada, o log é limpo.
	*/

	final class Transaction{
		private static $conn;//conexao ativa
		private static $logger; //objeto de log

		//private function __construct(){}

		public static function open($database){
			if(empty(self::$conn)){
				self::$conn = Connection::open($database);
				self::$conn->beginTransaction(); //iniciar a transação
				self::$logger = NULL; //desliga o log de SQL
			}
		}

		public static function get(){
			return self::$conn; //retorna a conexao ativa
		}

		public static function rollback(){
			if(self::$conn){
				self::$conn->rollback(); //desfaz as operações realizadas
				self::$conn = NULL;
			}
		}

		public static function close(){
			if (self::$conn){
				self::$conn->commit();//aplica as operações realizadas
				self::$conn = NULL;
			}
		}

		public static function setLogger(Logger $logger){
			self::$logger = $logger;
		}

		public static function log($message){
			if(self::$logger){
				self::$logger->write($message);
			}
		}
	}
?>