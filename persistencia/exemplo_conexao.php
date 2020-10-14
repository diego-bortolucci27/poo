<?php
	//require '../../../classes/active_record/Produto.php';
	require_once 'classes/active_record/Produto.php';
	require 'classes/api/Connection.php';
	/*
	Vamos utilizar a classe Connection!
	1º importamos a classe anteriormente criada (exemplos anteriores) com nome Produto, que é uma Active Record, bem como a classe Connection. Em seguida, abrimos uma conexão com o método Connection::open(), passando o nome do arquivo INI de configuração como parâmetro. O retorno $conn é do tipo PDO. A conexão criada é passada para o objeto Produto pelo método setConnection(). Caso a abertura da conexão não puder ser realizada, uma exceção será lançada e a execução continuará no bloco catch. Em seguida vamos instanciar um Produto, definimos seus atrivutos e por fim solicitamos sua persistencia por método do método save()
	Importante: em nenhum momento indicaremos a localização do arquivo de banco de dados, seu tipo, usuário e senha. Assim, caso resolvêssemos transferir o BD para outra tecnologia(Oracle, Microsoft, PostgreSQL, etc.), bastaria alterar os parametros do arquivo INI de configuração.
	*/

	try{
		$conn = Connection::open('estoque');
		Produto::setConnection($conn);

		$prod = new Produto;
		$prod->descricao = 'Coca-Cola 2 Litros retornável';
		$prod->estoque = 150;
		$prod->preco_custo = 3.89;
		$prod->preco_venda = 5.19 ;
		$prod->codigo_barras = '1234567891238';
		$prod->data_cadastro = date('Y-m-d');
		$prod->origem = 'N';
		$prod->save();
	}catch(Exception $erro){
		print $erro->getMessage();
	}
?>