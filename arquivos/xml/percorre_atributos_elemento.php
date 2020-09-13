<?php

	//Intepreta o documento XML

	$xml = simplexml_load_file('paises4.xml');

	echo '***País***<br>';
	echo $xml->nome . 'Capital: ' . $xml->capital . "<br>";
	echo '***ESTADOS***<br>';
	
	/*
		Percorre a lista dos estados, ou seja, os elementos "estado", que são filhos do elemento "estados" no arquivo XML
	*/

	foreach ($xml->estados->estado as $estado)
	{
		//Percorre os atributos de cada estado
		foreach ($estado->attributes() as $key => $value) 
		{
			echo "$key: $value<br>";
		}
	}
?>