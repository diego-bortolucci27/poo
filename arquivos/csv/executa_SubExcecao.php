<?php

	require_once 'csvParser_Excecao_V2.php';

	class FileNotFoundException extends Exception{}
	class FilePermissionException extends Exception{}

	$csv = new csvParser_Excecao_V2('clientes.csv', ';');

	try
	{
		$csv->parse(); //método que pode gerar exceção

		while ($row = $csv->fetch()) 
		{
			print $row['Cliente'] . " - " . $row['Cidade'] . "<br>";
		}
	}
	catch(FileNotFoundException $erro)
	{
		print_r($erro->getTrace());
		print "<br>";
		die(print $erro->getMessage());
	}
	catch(FilePermissionException $erro)
	{
		echo $erro->getFile() . ':' . $erro->getLine() . $erro->getMessage();
	}
?>