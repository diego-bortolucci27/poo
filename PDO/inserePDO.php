<?php

	require_once 'conexaoPDO.php';

	try
	{
		//Executar um comando insert com conexao PDO,tbm é possível executar outras instruções SQL com exec()
		$conexao->exec("INSERT INTO autores(codigo, nome) VALUES (2708, 'J.K Rowling')");
		print "Autor inserido com sucesso!";
		$conexao = null;
	}

	catch(Exception $erro_exception)
	{
		//Caso ocorra algum erro ao realizar o insert. O PHP / PDO, geram uma exceção do tipo PDOExceptiom, que consigo acessar através do objeto $erro, métodos para imprimir a mensagem interna do PHP e PDO, com informações técnicas do erro.

		print "Erro de sintaxe de comando SQL, não gerando uma PDOException";
	}

	catch(PDOException $erro)
	{
		//Caso ocorra algum erro ao realizar o insert. O PHP / PDO, geram uma exceção do tipo PDOException, que consigo acessar atráves do objeto $erro, métodos para imprimir a mensagem interna do PHP e PDO, com informações técnicas do erro.

		print "Erro ao inserir o autor no sistema!";
		print $erro->getMessage();
	}
?>