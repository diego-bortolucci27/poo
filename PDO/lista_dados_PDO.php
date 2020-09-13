<?php

	require_once 'conexaoPDO.php';

	try
	{
		//Executar um comando SQL, no caso do SELECT  com conexao PDO,tbm é possível executar outras instruções SQL, vamos usar a função query("Select..").

		$dadosAutores = $conexao->query("SELECT codigo, nome FROM autores");
		print "Autores cadastrados: <br>";
		if($dadosAutores)
		{
			// Percorre os dados que chegaram ao BD e estão em $dadosAutores
			// Neste caso optamos por utilizar fetch()
			while($autor = $dadosAutores->fetch(PDO::FETCH_OBJ))
			{
				// Exibe os dados na tela, acessando o objeto retornado pelo fetch
				echo $autor->codigo . ' - ' . $autor->nome . "<br>";
			}
		}

		$conexao = null;
	}

	catch(PDOException $erro)
	{
		//Caso ocorra algum erro ao realizar o insert. O PHP / PDO, geram uma exceção do tipo PDOException, que consigo acessar atráves do objeto $erro, métodos para imprimir a mensagem interna do PHP e PDO, com informações técnicas do erro.

		print "Erro ao listar os dados dos autores no sistema!";
		print $erro->getMessage();
	}
?>