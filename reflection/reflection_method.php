<?php

	require_once 'veiculo.php';

	$rm = new ReflectionMethod('Automovel', 'setPlaca');
	print $rm->getName() . '<br>';

	print $rm->isPrivate() ? 'É private' : 'Não é private';
	print '<br>';

	print $rm->isStatic() ? 'É static' : 'Não é static';
	print '<br>';

	print $rm->isFinal() ? 'É Final' : 'Não é Final';
	print '<br>';

	print_r($rm->getParameters());
?>