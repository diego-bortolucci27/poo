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
		Transaction::setLogger(new LoggerTXT('/tmp/log_delete.txt'));
		Transaction::log('Clonando um produto');

		$p1 = Produto::find(8);

		if ($p instanceof Produto)
		{
			$p1->delete;
		}

		else
		{
			throw new Exception("Produto não localizado!");
		}
	}

	catch(Exception $erro)
	{
		Transaction::rollback();
		print $erro->getMessage;
	}


?>