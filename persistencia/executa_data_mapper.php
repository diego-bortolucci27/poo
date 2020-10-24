<?php
	/*
	Nesse arquivo vamos utilizar o VendaMapper (exemplo que usa o Desig Pattern Data Mapper). O exemplo inicia com a importação das classes de domínio (Produto, Venda) e de persistência (VendaMapper). Em seguida criamos dois objetos representando produtos (p$1 e $p2). É importante notar que esses ojetos deveriam ser carregados a partir do baco de dados por outra Data Mapper (ProdutoMapper), e não criados diretamente. Foi realizado dessa maneira somente para simplificar o exemplo. Criados os objetos, istanciamos um objeto da classe Venda e adicionamos os dois produtos, bem como suas quantidades, método addItem(). Por fim criamos uma conexão (PDO), passamos essa conexão para o Data Mapper pelo método setConection() e solicitamos que VendaMapper persista a venda, bem como seus itens, o que é feito pelo método save().
	*/

	require_once 'classes/data_mapper/Produto.php';
	require_once 'classes/data_mapper/Venda.php';
	require_once 'classes/data_mapper/VendaMapper.php';

	try{
		$p1 = new Produto;
		$p1->id = 1;
		$p1->preco = 12;

		//print_r($p1);

		$p2 = new Produto;
		$p2->id = 2;
		$p2->preco = 14;

		//print_r($p2);

		$venda = new Venda;

		//adicioa algus produtos
		$venda->addItem(10, $p1);
		$venda->addItem(20, $p2);

		$conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=estoque', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		VendaMapper::setConnection($conn);

		//salva a venda
		VendaMapper::save($venda);

	}catch(Exception $erro){
		print $erro->getMessage();
	}
?>