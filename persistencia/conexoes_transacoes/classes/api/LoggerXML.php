<?php
	/*
	Essa classe contém o método write(), que receberá a mensagem (instrução SQL ou texto) e armazenará em um arquivo no formato XML, também registramos a hora do log com a tag <time>, além dessa tag observe outras que utilizaremos para o formato XML.
	*/

	class LoggerXML extends Logger{
		public function write($message){
			date_default_timezone_set('America/Sao_Paulo');
			$time = date("Y-m-d H:i:s");
			$texto = "<log>\n";
			$texto .= " <time>$time</time>\n";
			$texto .= " <message>$message</message>\n";
			$texto .= "</log>\n";
			//adiciona ao final do arquivo
			$handler = fopen($this->filename, 'a');
			fwrite($handler, $texto);
			fclose($handler);
		}
	}
?>