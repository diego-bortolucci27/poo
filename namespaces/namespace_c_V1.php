<?php
	
	require_once 'Library\Widgets';

	use Library\Container\Table;

	use SplFileInfo;

	class Form
	{
		public function fazAlgo(Field $campo){ }
		public function show()
		{
			new Table;
			new SplFileInfo('/tmp/shadow');
		}
	}

	/*
		Nesse arquivo estamos criando a classe Form do Namespace Library\Widgets. Vejamos alguns detalhes importantes:

		A classe Form contém o método fazAlgo() que recebe um parâmetro da classe Field.

		Como a classe Field é exatamente do mesmo Namespace que a classe Form, ela será reconhecida. Mas no caso precisemos utilizar uma classe de outro Namespace, teremos que importá-la por meio do operador "use".

		Nesse exemplo, que precisaremos da classe Table, que é parte do Namespace Library\Container. Caso não utilizássemos o que Library\Container\Table no inicio, na medida em que tivéssemos de utilizar essa classe pela primeira vez, teremos um erro do tipo "Fatal Error: 'Library\Widgets\Table'", pois o PHP tentaria busca-la no Namespace atual, que é Library\Widgests. 

		O mesmo ocorre com as classe nativas do PHP, como é o caso da SplFileInfo. Se não tivéssemos utilizado o comando use SplFileInfo para importar essa classe, teríamos o erro "Fatal Error: Class 'Library\Widgets\SplFileInfo'" not found. Outra maneira de evitar esse problema é utilizar new \SplFileInfo(...). Ao referenciarmos o Namespace absoluto, é dispensada a utilização do "use".
	*/
?>