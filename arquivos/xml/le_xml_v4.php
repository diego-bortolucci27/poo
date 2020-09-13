<?php
	
	//Interpreta o documento XML

	$xml = simplexml_load_file('paises2.xml');

	//Exibe as informações do objeto $xml

	//var_dump($xml);

	//Acessando elemento filhos

	/*
	foreach ($xml->children() as $elemento => $valor)
	{
		echo "$elemento: $valor <br>";
	}
	*/

	//Exibindo informações

	echo "Nome:" . $xml->nome . "<br>";
	echo "Idioma: " . $xml->idioma . "<br>";
	//echo "Capital: " . $xml->capital . "<br>";
	//echo "Moeda: " . $xml->moeda . "<br>";
	//echo "Prefixo: " . $xml->prefixo . "<br>";
	echo '*** Informações Geográficas: *** <br>';
	echo 'Clima: ' . $xml->geografia->clima . "<br>";
	echo 'Costa: ' . $xml->geografia->costa . "<br>";
	echo 'Pico: ' . $xml->geografia->pico . "<br>";
?>