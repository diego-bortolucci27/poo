<?php
	
	/*
		Após criar a classe Logger, já podemos ter várias subclasses(classe que herdam de Logger, tbm chamadas de classe 'filhas'), como: LoggerTXT, Logger XML e LoggerHTML... Quando compreendemos como declarar uma classe de log, fica muito fácil criar novas(classes) e novos logs. Cada classe concreta como o caso LoggerTXT e demais classes que herdarão de Logger, terá que implementar o Logger, terá que implementar o método write(), que será responsável por armazernar a mensagem no arquivo de log. A primeira classe será LoggerXML, ess classe contém o método write(), que receberá a instrução SQL ou texto e armazenará em um arquivo formato XML, observando algumas tags. Detalhe: armazenaremos também a hora do log com a tag time.
	*/
	
	abstract class Logger
	{
		protected $filename; //Local do arquivo de Log

		public function __construct($filename)
		{
			$this->filename = $filename;
			file_put_contents($filename, ''); //Limpa o arquivo
		}

		//Define o método write como abstrato, portanto obrigatório implementar nas classes filhas

		abstract function write($message);
	}

?>