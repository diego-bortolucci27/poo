<?php
	
	//Percorrer arquivo com SPL
	
	$file = new SplFileObject('spl_file_object_V2.php');
	print 'Forma 1: <br>' . PHP_EOL;

	while(!$file->eof())
	{
		print 'Linha: ' . $file->fgets() . "<br>";
	}

	print 'Forma 1: <br>' . PHP_EOL;

	foreach ($file as $linha => $conteudo)
	{
		print "$linha: $conteudo <br>";
	}
?>