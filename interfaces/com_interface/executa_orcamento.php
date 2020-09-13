<?php

	/*
		Esse arquivo executa nossa aplicação, criando um orçamento, no qual serão inseridos alguns produtos e ao final será exibido o total do orçamento.

		IMPORTANTE (sobre todo o programa Produto, Orcamento e executa_orcamento):

		A classe Orcamento utiliza o método calculaTotal() o método getPreco() da classe Produto, ou seja, ela sabe muito a respeito da classe Produto, tendo a certeza que a classe Produto contém esse método. Isso caracteriza forte acoplamento do tipo estático. 

		Segundo ponto importante, a classe Orcamento somando funciona com Produto. Mas e se futuramente seu cliente desejar fazer orçamentos de outras coisas que não sejam produtos, como serviçoes, por exemplo?

		Para solucionar essa questão prescisamos flexibilizar nossa classe Orcamento, orçando outros itens além de produtos.

		Não precisamos forçar que a classe Orcamento aceite somente objetos da classe Produto. Para resolver essa questão aceitar objetos de outras classes, vamos usar INTERFACES para definir uma "interface" de comunicação.

		Essa interface permitirá que a classe Orcamento possa receber objetos de várias classes também. Desde que esses objetos concorde, com essa interface. Assim, vamos declarar uma interface de comunicação chamada OrcavelInterface, ou seja, interface para elementos orçáveis. Como a classe Orcamento somente precisa do método getPreco() para fazer o orçamento, é esse método que colocaremos nessa interface.
	*/

	require_once 'classes/Produto.php';
	require_once 'classes/Orcamento.php';
	require_once 'classes/Servico.php';
	require_once 'classes/OrcavelInterface.php';

	$orcamento = new Orcamento;
	$orcamento->adiciona(new Produto('Cafeteira', 10, 199), 1);
	$orcamento->adiciona(new Produto('Cápsula de Café', 5, 10), 3);
	$orcamento->adiciona(new Produto('Pão de Queijo', 7, 7), 2);
	$orcamento->adiciona(new Servico('Formatação de PC', 100), 2);
	$orcamento->adiciona(new Servico('Compra e Venda de Jogos', 50), 2);

	//print $orcamento->calculaTotal();

	print "Total do Orçamento R$ " . number_format($orcamento->calculaTotal(), 2, ',', '.');
?>