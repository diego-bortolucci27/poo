<?php

	require_once 'veiculo.php';

	// Vinculado à classe Automóvel, assim ele traz todas informações da classe Automóvel

	$rc = new ReflectionClass('Automovel');

	// Retorna os métodos do objeto $rc, ou seja os métodos da classe Automóvel
	print_r($rc->getMethods());
	print '<br><br>';

	// Retorna os métodos do objeto $rc, ou seja os métodos da classe Automóvel
	print_r($rc->getProperties());
	print '<br><br>';

	// Retorna o nome da superclasse vinculada ao objeto $rc, ou seja, retorno o nome da Superclasse da classe Automóvel.
	print_r($rc->getParentClass());
?>