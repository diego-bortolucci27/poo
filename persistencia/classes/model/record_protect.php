<?php

	/*
		Este programa testa o encapsulamento ao tentarmos atribuir um valor inválido (texto por exemplo) a um atributo (no caso estoque), de um objeto Produto. Para tal, o programa inicia com a importação das classes necessárias. Em seguida abrimos uma transação, gravando no arquivo /tmp/log_protect.txt.
		
		Primeiro carregamos o objeto com id 2 sa classe Produto. Em seguida alteramos o estoque, atraves  da propriedade estoque, tentando armazenar nela um valor inválido "dois". Nesse instante, o método set_estoque() automaticamente entra em cena, validando essa atribuição. Como uma exceção é lançada, a execução segue para o bloco catch, no qual a mensagem de exceção é exibida.
	*/

	require_once 'classes/api/Transaction.php';
	require_once 'classes/api/Connection.php';
	require_once 'classes/apiLogger.php';
	require_once 'classes/api/LoggerTXT.php';
	require_once 'classes/api/Record.php';
	require_once 'classes/model/Produto.php ';

	try
	{
		Transaction::open('estoque');
		Transaction::setLogger(new LoggerTXT('/tmp/log_protect.txt'));
		Transaction::log('Protegendo o acesso a um produto');
		$p1 = Produto::find(3);
		$p1->estoque = '80';
		$p1->store();
		Transaction::close();
	}

	catch(Exception $erro)
	{
		Transaction::rollback();
		$erro->getMessage();
	}


?>