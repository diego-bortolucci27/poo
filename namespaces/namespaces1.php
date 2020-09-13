<?php

	// Declaração

	namespace Application;
	class Form{}

	namespace Components;
	class Form{}

	// Utilizar

	var_dump(new Form); //object(Components\Forms)
	print "<br>";
	var_dump(new \Components\Form); //object(Components\Form)
	print "<br>";
	var_dump(new \Application\Form); //object(Application\Form)
	print "<br>";
	var_dump(new \SplFileInfo('/etc/shaddow')); //object(SplFileInfo)
	print "<br>";
	var_dump(new \SplFileInfo('/etc/shaddow')); //Fatal error: 'Components\SplFileInfo'

	/*
		É importante dizer que não é uma boa prática declarar mais de uma classe no mesmo arquivo; vamos corrigir esse equívoco mais adiante. No próximo exemplo vamos melhorar nosso programa, separando os Namespaces, inserindo cada Namespace em um arquivo .php separados, já que não é boa prática inserir mais que 1 namespaces no mesmo arquivo.

		Assim, nosso próximo programa já resolverá a questão dos Namespaces, não havendo mais que um Namespace em cada arquivo. Quanto as classes continuarmos com mais de uma classe por enquanto, porém tem o final do tema Namespace, vamos evoluindo passa-a-passo na solução desse problema e então não teremos mais teremos mais múltiplas classes em um único arquivo...
	*/
?>