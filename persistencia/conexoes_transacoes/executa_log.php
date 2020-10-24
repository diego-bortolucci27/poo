<?php
	require_once 'classes/active_record/ProdutoComTransacaoE_Log.php';
	require_once 'classes/api/Connection.php';
	require_once 'classes/api/Transaction.php';
	require_once 'classes/api/Logger.php';
	require_once 'classes/api/LoggerTXT.php';

	try{
		Transaction::open('estoque');
		Transaction::setLogger(new LoggerTXT('/tmp/log.txt'));
		Transaction::log('Inserindo produto novo!');

		//insere produto
		$p1 = new Produto;
		$p1->descricao = 'Chocolate cacau 40%';
		$p1->estoque = 123;
		$p1->preco_custo = 7.99;
		$p1->preco_venda = 14.59;
		$p1->codigo_barras = '321654321654123';
		$p1->data_cadastro = date('Y-m-d');
		$p1->origem = 'N';
		$p1->save();

		Transaction::close();
	}catch(Exception $erro){
		Transaction::rollback();
		print $erro->getMessage();
	}

?>