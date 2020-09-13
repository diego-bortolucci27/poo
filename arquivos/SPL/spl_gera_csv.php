<?php

	$dados = array(
		array('codigo', 'nome', 'endereco', 'telefone'),
		array('1', 'Cristiano Ronaldo', 'Rua Portugal', '(07) 705651234'),
		array('2', 'Lionel Messi', 'Rua Barcelona', '(10) 123456789'),
		array('3', 'Marta', 'Avenida Brasil', '(11) 987654321')
	);

	$file = new SplFileObject('dados.csv', 'w');
	$file->setCsvControl(',');

	foreach ($dados as $linha)
	{
		$file->fputcsv($linha);
	}
?>