<?php
	require_once 'classes/api/Connection.php';
	require_once 'classes/api/Transaction.php';
	require_once 'classes/active_record/Produto.php';

	try{
		Transaction::open('estoque');

		//obtem a conexao ativa
		$conn = Transaction::get();
		Produto::setConnection($conn);

		$p1 = new Produto;
		$p1->descricao = 'Sorvete pote 2 litros';
		$p1->estoque = 55; 
		$p1->preco_custo = 12.00;
		$p1->preco_venda = 18.90;
		$p1->codigo_barras = '12365478932';
		$p1->data_cadastro = date('Y-m-d');
		$p1->origem = 'N';
		$p1->save();

		Transaction::close();
	}catch (Exception $erro){
		Transaction::rollback();
		print $erro->getMessage();
	}

?>