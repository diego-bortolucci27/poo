<?php
	
	//Interpreta o documento XML

	$xml = simplexml_load_file('paises.xml');

	//Exibe as informações do objeto $xml

	//var_dump($xml);

	//Exibindo informações

	echo "Nome:" . $xml->nome . "<br>";
	echo "Idioma: " . $xml->idioma . "<br>";
	echo "Capital: " . $xml->capital . "<br>";
	echo "Moeda: " . $xml->moeda . "<br>";
	echo "Prefixo: " . $xml->prefixo . "<br>";
?>