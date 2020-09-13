<?php
	
	//Interpreta o documento XML

	$xml = simplexml_load_file('paises2.xml');

	//Alterando propiedades (ou atributos)

	$xml->moeda = 'Dólar Canadense ($)';
	$xml->geografia->clima = 'frio';

	//Adicionar novo nodo
	
	$xml->addChild('primeiro ministro', 'Justin Trudeau');

	//Exibindo o novo conteúdo do arquivo XML

	echo $xml->asXML();

	//Grava no arquivo paises2.xml o que foi inserido

	file_put_contents('paises2.xml', $xml->asXML());

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