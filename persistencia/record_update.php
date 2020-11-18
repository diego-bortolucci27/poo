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
		Transaction::setLogger(new LoggerTXT('tmp/log/log_update.txt'));
		Transaction::log('Alterando um produto!');

		$p1 = Produto::find(5);
		print $p1->descricao;
		print "Antes da alteração: ";
		print $p1->estoque . "<br>";

		$p1->estoque += 20;
		print "Depois da alteação: ";
		print $p1->estoque . "<br>";
		$p1->store();

		Transaction::close();
	}

	catch(Exception $erro)
	{
		Transaction::rollback();
		print $e->getMessage;
	}
?>