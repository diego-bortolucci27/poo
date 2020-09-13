<?php
	
	//Interpreta o documento XML

	$xml = simplexml_load_file('paises.xml');

	//Exibe as informações do objeto $xml

	var_dump($xml);

?>