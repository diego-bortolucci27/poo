<?php

	// Classe para transações em DB

	final class Transaction
	{
		private static $conn; //Conexão ativa

		private function __construct(){}

		public static function open($database)
		{
			if(empty(self::$conn))
			{
				self::$conn = Connection::open($database);
				self::$conn->beginTransaction(); //inicia a transação
			}
		}

		public static function get()
		{
			return self::$conn; //Retorna a conexão ativa
		}

		public static function rollback()
		{
			if(self::$conn)
			{
				self::$conn->rollback(); //Desfaz as operações realizadas
				self::$conn = NULL;
			}
		}

		public function close()
		{
			if(self::$conn)
			{
				self::$conn->commit(); //Aplica as operações realizadas
				self::$conn = NULL;
			}
		}
	}
?>