<?php

	/*
		Nesse exemplo utilizamos as classes definidas anteriormente. Incialmente utilizaremos o require_once() para importar os arquivos. Em seguida utilizaremos o operador use para importar as classes por meio de seu nome qualificado (completo). Posteriormente criaremos objetos a partir dessas classes para verificar por meio do var_dump() qual classe internamente o PHP instanciou na verdade 
	*/

	require_once 'namespaces_V1.php';
	require_once 'namespace_b_V1.php';
	require_once 'namespace_c_V1.php';

	use Library\Widgets\Field;
	use Library\Widgets\Form;
	use Library\Container\Table;

	var_dump(new Field); // object(Library\Widgets\Field)
	print "<br>";
	var_dump(new Form); // object(Library\Widgets\Form)
	print "<br>";
	var_dump(new Table); // object(Library\Container\Table)
	print "<br>";

	$form = new Form;
	$form->show();

	/*
		Como percebemos nos exemplos anteriores, não tomamos muito cuidado com o arquibvo no qual cada classe seria salvo. No exemplo a seguir (Field.php), vamos demonstrar como escolher o nome e o local mais apropiados para determinada classe.
	*/
?>