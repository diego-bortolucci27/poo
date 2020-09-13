<?php

	$file = new SplFileObject('spl_file_object.php');

	print 'Nome: ' . $file->getFileName() . '<br>';

	$file2 = new SplFileObject("novo.txt", "w");
	$bytes = $file2->fwrite("Olá Mundo PHP com SPL" . PHP_EOL);
	print 'Bytes escritos: ' . $bytes . '<br>';
?>