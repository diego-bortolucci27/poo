<?php
	
	// conexao ao mysql / bd livro via PDO

	try
	{
		$conexao = new PDO('mysql:host=127.0.0.1;port=3306;dbname=biblioteca','root','');
		print "Conexão com o Banco de Dados estabelecida com sucesso!";
	}
	catch(PDOException $erro)
	{
		print "Erro ao conectar ao banco de dados";
		print $erro->getMessage();
	}
?>