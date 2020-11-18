<?php

	/*
		Antes de podermos armazenar, excluir e buscar registros, precisamos definir nossa classe Active Record Produto. Não se surpreenda com o tamanho da classe. Apesar de tão enxuta, ela é totalmente funcional, pois os métodos de persistência estão todos localizados na superclasse Record. Veja que a classe Produto, embora seja uma Active Record, não tem de maneira explícita os métodos de persistência, Pois estes estão na classe pai, ou seja, na superclasse (Layer Supertype). Com isso, temos bastante espaço para definir os métodos de regra de negócio.

		Utilizar encapsulamento é de extrema importância, principalmente em um ambiente em equipe no qual é responsável por criar uma classe e outras por utilizarem-na. Se a classe prover encapsulamento, ela protegerá as suas propiedades contra o mau uso de terceiros. Assim teremos um sistema mais confiável e íntegro.

		Vamos implementar neste exemplo o encapsulamento em uma solução que utiliza Active Record e Layer Supertyp, no nosso caso nossa classe Record, da maneira que havíamos implementado, ou seja, sem ter o set_estoque aqui na classe Produto, sempre que era atribuido um valor para um atributo (ou propiedade), o método __set(), da classe Record era executado, intecerptando essa atribuição. Caso exista algum método na classe nomeado por set_<propiedade>, ele será executado no lugar da simples atribuição. Dessa forma, se estivermos atribuindo um valor para propiedade nome, o método set_nome() na classe e irá executa-lo. Caso contrário, o valor será atribuido à propiedade diretamente.

		Como implementado, demonstramos como podemos proteger algumas propiedades internas de um objeto. Para isso, alteramos a classe Active Record Produto e criamos o método entrará em funcionamento e receberá o novo valor a ser inserido no atributo estoque, porém invés de inserir o novo valor para verificar se é um número e se possui um valor maior que zero, somente após está validação que o valor será atribuido ao atributo estoque. 
	*/

	class Produto extends Record
	{
		const TABLENAME = 'produto';

		public function set_estoque($estoque)
		{
			if (is_numeric($estoque) AND $estoque > 0) 
			{
				$this->data['estoque'] = $estoque;
			}

			else
			{
				throw new Exception("Estoque {$estoque} inválido em __CLASS__");
			}
		}
	}

?>