<?php

	require_once 'veiculo.php';

	$rp = new ReflectionProperty('Automovel', 'placa');
	print $rp->getName() . '<br>';

	print $rp ->isPrivate() ? 'É private' : 'Não é privado';
	print '<br>';

	print $rp ->isStatic() ? 'É static' : 'Não é static';
	print '<br>';
?>