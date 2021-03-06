<?php

	require_once 'classes/rdg/ProdutoGateway.php';

	try
	{
		$conn = new PDO('mysql:host=127.0.0.1; port=3306; dbname=estoque','root','');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		ProdutoGateway::setConnection($conn);

		//Lista todos os dados da tabela no BD estoque
		$produtos = ProdutoGateway::all();

		//percorre os dados e apaga todos os dados que estavam no BD
		foreach ($produtos as $produto)
		{
			$produto->delete();
		}

		$p1 = new ProdutoGateway;
		//Insere produtos, informando os dados para cada atributo do objeto $p1 da classe ProdutoGateway

		$p1->descricao = 'Cola-Cola 2L';
		$p1->estoque = 100;
		$p1->preco_custo = 5.19;
		$p1->preco_venda = 7.19;
		$p1->codigo_barras = '12345678';
		$p1->data_cadastro = date('Y-m-d');
		$p1->origem = 'N';

		//Faz a gravção no BD, realizando um INSERT, PARA INSERIR OS DADOS informados para o objeto $p1

		$p1->save();

		$p2 = new ProdutoGateway;
		$p2->descricao = 'Cola-Cola 2L';
		$p2->estoque = 100;
		$p2->preco_custo = 5.19;
		$p2->preco_venda = 7.19;
		$p2->codigo_barras = '12345678';
		$p2->data_cadastro = date('Y-m-d');
		$p2->origem = 'N';

		$p2->save();
	}

	catch(Exception $erro)
	{
		print $erro->getMessage();
	}
?>