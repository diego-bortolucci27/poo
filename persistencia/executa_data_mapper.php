<?php

	require_once 'classes/data_mapper/Produto.php';
	require_once 'classes/data_mapper/Venda.php';
	require_once 'classes/data_mapper/VendaMapper.php';

	try
	{
		$p1 = new Produto;
		$p1->id = 1;
		$p1->preco = 12;

		$p2 = new Produto;
		$p2->id = 2;
		$p2->preco = 25;

		$venda = new Venda;
		$venda->addItem(10, $p1);
		$venda->addItem(20, $p2);

		$conn = new PDO('mysql:host=127.0.0.1; port=3306; dbname=estoque','root','');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		VendaMapper::setConnection($conn);

		// Salvar a Venda
		VendaMapper::save($venda);
	}
	catch(Exception $erro)
	{
		print $erro->getMessage();
	}
?>