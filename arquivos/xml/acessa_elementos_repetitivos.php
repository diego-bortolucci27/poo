<?php

	//Intepreta o documento XML
	
	$xml = simplexml_load_file('paises3.xml');

	echo '***País***<br>';
	echo $xml->nome . 'Capital: ' . $xml->capital . "<br>";
	echo '***ESTADOS***<br>';
	/*
		podemos acessar os estados pelo seu indice no vetor "nome" do elemento "estados"
		echo $xml->estados->nome[0]
	*/

	foreach ($xml->estados->nome as $estado)
	{
		echo $estado . '<br>';
	}
?>

