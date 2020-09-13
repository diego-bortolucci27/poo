<?php

	require_once 'csvParser_Excecao.php';
	$csv = new csvParser_Excecao('clientes.csv', ';');

	try
	{
		$csv->parse(); //método que pode gerar exceção

		while ($row = $csv->fetch()) 
		{
			print $row['Cliente'] . " - " . $row['Cidade'] . "<br>";
		}
	}
	catch(Exception $erro)
	{
		print $erro->getMessage();
	}
?>