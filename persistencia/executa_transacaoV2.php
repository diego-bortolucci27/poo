<?php
	
	require_once 'classes/active_record/ProdutoComTransacao.php';
	require_once 'api/Connection.php';
	require_once 'api/Transaction.php';

	try
	{
		Transaction::open('estoque');
		//obtem a conexão ativa
		$conn = Transaction::get();
		Produto::setConnection($conn);

		$p1 = new Produto;
		$p1->descricao = 'Mouse sem fio Dell';
		$p1->estoque = 10;
		$p1->preco_custo = 89.00;
		$p1->preco_venda = 119.00;
		$p1->codigo_barras = '123456789123456';
		$p1->data_cadastro = date('Y-m-d');
		$p1->origem = 'N';
		$p1->save();
		
		throw new Exception("Teste de Exceção, testando se as configurações de exceção deram certo.");

		$p2 = new Produto;
		$p2->descricao = 'Teclado sem fio Dell';
		$p2->estoque = 20;
		$p2->preco_custo = 99.00;
		$p2->preco_venda = 139.00;
		$p2->codigo_barras = '223456789123456';
		$p2->data_cadastro = date('Y-m-d');
		$p2->origem = 'N';
		$p2->save();

		Transaction::close();
	}

	catch(Exception $erro)
	{
		Transaction::rollback();
		print $erro->getMessage();
	}

?>