<?php
/*
 vamos importar a classe ProdutoGateway. Em seguida, vamos conectar ao BD estoque no MySQL e passarmos essa conexao para o Gateway por meio do método setConnection(). Antes de gravar novos objetos , vamos obter todos por meio do método all(), bem como apagar um por um pelo método delete(). Então, instaciamos dois objetos Row Data Gateway, $produto1 e $produto2, ambos instancias de ProdutoGateway. Como o objeto retorna as informações na medida em que definimos seus atributos, basta executar o método save() para que ambos sejam salvos na base de dados. Em seguida, utilizamos o método find(), que busca um registro e o retorna na forma de um objeto. Então incrementamos o estoque e solicitamos atualização do objeto por meio do método save(). Veja que não precisamos informar novamente de qual objeto se tratava ao utilizar o método save(), visto que ele obteve as informações necessárias do vetor $data.
*/

 require_once 'classes/rdg/ProdutoGateway.php';
 

 try{
 	$conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=estoque', 'root', '');
 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	ProdutoGateway::setConnection($conn);

 	$produtos = ProdutoGateway::all();
 	foreach ($produtos as $produto) {
 		$produto->delete();
 	}

 	$produto1 = new ProdutoGateway;
 	$produto1->descricao = 'Fanta 2 Litros';
 	$produto1->estoque = 80;
 	$produto1->preco_custo = 3.99;
 	$produto1->preco_venda = 5.99;
 	$produto1->codigo_barras = '123654789123456';
 	$produto1->data_cadastro = date('Y-m-d');
 	$produto1->origem = 'N'; 

 	$produto1->save();

 	$produto2 = new ProdutoGateway;
 	$produto2->descricao = 'Fanta 600 ML';
 	$produto2->estoque = 110;
 	$produto2->preco_custo = 2.29;
 	$produto2->preco_venda = 3.59;
 	$produto2->codigo_barras = '987547891234456';
 	$produto2->data_cadastro = date('Y-m-d');
 	$produto2->origem = 'N';

 	$produto2->save();
 
 	$busca = ProdutoGateway::find(1);
 	$busca->estoque += 50;
 	$busca->save();

 }catch(Exception $erro){
 	print $erro->getMessage();
 }

?>