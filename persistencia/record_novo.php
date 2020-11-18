<?php

	require_once 'classes/api/Transaction.php';
	require_once 'classes/api/Connection.php';
	require_once 'classes/api/Logger.php';
	require_once 'classes/api/LoggerTXT.php';
	//require_once 'classes/api/Record.php';
	require_once 'classes/model/Produto.php';

	try
	{
		Transaction::open('estoque');
		Transaction::setLogger(new LoggerTXT('/tpm/log_novoTB.txt'));
		Transaction::log('Inserindo produto novo');

		$p1 = new Produto;
		$p1->descricao = 'Mouse sem fio logitech';
		$p1->estoque_custo = 23;
		$p1->preco_custo = 39.00;
		$p1->preco_venda = 59.00;
		$p1->codigo_barras = '123456789';
		$p1->data_cadastro = date('Y-m-d');
		$p1->origem = 'N';
		$p1->store();
		Transaction::close();
	}

	catch(Exception $erro)
	{
		Transaction::rollback();
		print $erro->getMessage();
	}

?>