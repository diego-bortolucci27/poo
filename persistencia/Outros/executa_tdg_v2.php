<?php

	require_once 'classes/tdg/ProdutoGateway.php';
	require_once 'classes/tdg/Produto.php';

	try
	{
		$conn = new PDO('mysql:host=127.0.0.1; port=3306; dbname=estoque','root','');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		Produto::setConnection($conn);

		$produtos = Produto::all();
		foreach ($produtos as $produto)
		{
			$produto->delete(); // Vamos apagar todos os produtos que tem no bd
		}
	

		// Agora faremos um novo cadastro

		$p1 = new Produto;
		$p1->descricao = "Coca-Cola 2 Litros";
		$p1->estoque = 120;
		$p1->preco_custo = 5;
		$p1->preco_venda = 7.19;
		$p1->codigo_barras = '123456789';
		$p1->data_cadastro = date('Y-m-d');
		$p1->origem = 'N';

		// Vamos salvar as propiedades (atributos) do objeto $p1, no BD, ou seja vamos gravar os dados do produto representado pelo objeto p1 no BD.

		$p1->save();

		$p2 = new Produto;
		$p2->descricao = "Coca-Cola 600 Ml";
		$p2->estoque = 180;
		$p2->preco_custo = 2.99;
		$p2->preco_venda = 3.99;
		$p2->codigo_barras = '987654321';
		$p2->data_cadastro = date('Y-m-d');
		$p2->origem = 'I';

		// Salvando os atributos de p2 no BD...

		$p2->save();

		$busca = Produto::find(1);
		print 'Descrição: ' . $busca->descricao . "<br>";
		print 'Margem de Lucro: ' . $busca->getMargemLucro() . "%<br>";
		$busca->registraCompra(14, 5);
		$busca->save();

	}
	catch(Exception $erro)
	{
		print "Erro ao inserir o produto.";
		print $erro->getMessage();
	}
?>