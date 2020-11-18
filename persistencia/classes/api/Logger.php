<?php

/*
aqui temos a implementação da classe abstrata Logger, a qual será herdada pelas classes LoggerXML, LoggerHTML e LoggerTXT. Cada classe concreta terá de implementar o método write(), que será responsável por escrever no arquivo de log.
*/
	abstract class Logger{
		protected $filename; //local do arquivo

		public function __construct($filename){
			$this->filename = $filename;
			file_put_contents($filename, ''); //limpa o conteúdo do arquivo
		}

		//define o modo write como obrigatório
		abstract function write($message);
	}
?>