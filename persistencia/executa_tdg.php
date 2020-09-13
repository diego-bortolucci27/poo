<?php

	require_once 'classes/tdg/ProdutoGateway.php';

	$data1 = new stdClass;
	$data1->descricao = "Coca-Cola 2 Litros";
	$data1->estoque = 120;
	$data1->preco_custo = 5;
	$data1->preco_venda = 7.19;
	$data1->codigo_barras = '123456789';
	$data1->data_cadastro = date('Y-m-d');
	$data1->origem = 'N';

	$data2 = new stdClass;
	$data2->descricao = "Coca-Cola 600 Ml";
	$data2->estoque = 180;
	$data2->preco_custo = 2.99;
	$data2->preco_venda = 3.99;
	$data2->codigo_barras = '987654321';
	$data2->data_cadastro = date('Y-m-d');
	$data2->origem = 'I';

	try
	{
		$conn = new PDO('mysql:host=127.0.0.1; port=3306; dbname=estoque','root','');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		ProdutoGateway::setConnection($conn);

		$gateway = new ProdutoGateway;
		$gateway->save($data1);
		$gateway->save($data2);

		$produto = $gateway->find(1);
		$produto->estoque += 2;
		$gateway->save($produto);

		foreach($gateway->all("estoque >= 10") as $produto)
		{
			print $produto->descricao . "<br>";
		}
	}
	catch(Exception $erro)
	{
		print "Erro ao inserir o produto.";
		print $erro->getMessage();
	}
?>