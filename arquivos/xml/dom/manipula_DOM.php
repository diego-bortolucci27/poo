<?php
	
	$doc = new DOMDocument();
	$doc->load('bases.xml');

	$bases = $doc->getElementsByTagName("base");

	foreach ($bases as $base)
	{
		print 'ID: ' . $base->getAttribute('id') . "<br>";

		//Capturando os elementos filhos de cada base e armazeno em um vetor para cada tipo de elemento.

		$names = $base->getElementsByTagName('name');
		$hosts = $base->getElementsByTagName('host');
		$types = $base->getElementsByTagName('type');
		$users = $base->getElementsByTagName('user');

		//Pego os dados do elemento atual nos vetores que contém dados de todos elementos...

		$name = $names->item(0)->nodeValue;
		$host = $hosts->item(0)->nodeValue;
		$type = $types->item(0)->nodeValue;
		$user = $users->item(0)->nodeValue;

		//Imprime os dados de cada elemento filho da base atual.

		print 'Name: ' . $name . '<br>';
		print 'Host: ' . $host . '<br>';
		print 'Type: ' . $type . '<br>';
		print 'User: ' . $user . '<br>';
		print '<br>';
	}
?>