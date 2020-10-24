<?php
	require_once 'classes/active_record/ProdutoComTransacao.php';
	require_once 'classes/api/Connection.php';
	require_once 'classes/api/Transaction.php';

	try{
		Transaction::open('estoque');

		$prod = new Produto;
		$prod->descricao = 'Coca-Cola 2 Litros retornável';
		$prod->estoque = 150;
		$prod->preco_custo = 3.89;
		$prod->preco_venda = 5.19 ;
		$prod->codigo_barras = '1234567891238';
		$prod->data_cadastro = date('Y-m-d');
		$prod->origem = 'N';
		$prod->save();

		Transaction::close();

	}catch(Exception $erro){
		Transaction::rollback();
		print $erro->getMessage();
	}
	
?>