<?php

	/*
		Para carregar uma classe a partir de um caminho de namesoace, vamos registrar o método autoloading por meio da função spl_autoload_register().
		A função spl_autoload_register() é responsável por definir um algorítmo de carga de classes, ou seja, ela indica para o PHP como as classes serão carregadas a partir de seu nome. É importante notar que podemos registrar várias funções de autoloading, formando uma "pilha" de funções. Neste exemplo, registraremos uma função anônima que irá carregar o arquivo a partir do nome da classe. Assim, sempre que uma classe for requisitada (ex: quando for executado o "new"), a função registrada será executada, recebendo o nome da classe como parâmetro. Então ela vai substituir as barras do nome do Namespace pela barra de diretórios e acrescentar ".php" ao final.
	*/

	spl_autoload_register(function ($class)
	{
		require_once(str_replace('\\', '\\', $class . '.php'));
		// No Linux, seria assim: (ele usa / e Windows usa \ para abrir pastas e afins)
		//require_once(str_replace('\\', '/', $class . '.php'));
	});

	use Library\Widgets\Field;
	var_dump(new Field);

?>