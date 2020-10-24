<?php
/*
 Importamos as classes necessárias, através de require_once. Em seguida abrimos conexão
 (new PDO) com a base de dados (estoque). O exemplo inicia com a chamada do método all(), que retorna todos os objetos já inseridos a tabela. Em seguida, em um foreach, excluimos todos eles. Posteriormente, instanciamos os objetos $data1 e $data2 para então salva-los em no BD pelo método save(). Por fim, usamos o find() para buscar um objeto, exibimos sua descrição, sua margem de lucro e registramos uma compra com o método registraCompra() para então armazena-lo novamente com o metodo save().
*/

 require_once 'classes/tdg/ProdutoGateway.php';
 require_once 'classes/tdg/Produto.php';

 try{
 	$conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=estoque', 'root', '');
 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	ProdutoGateway::setConnection($conn);

 	$produtos = Produto::all();
 	foreach ($produtos as $produto) {
 		$produto->delete();
 	}

 $data1 = new Produto;
 $data1->descricao = 'Fanta 2 Litros';
 $data1->estoque = 80;
 $data1->preco_custo = 3.99;
 $data1->preco_venda = 5.99;
 $data1->codigo_barras = '123654789123456';
 $data1->data_cadastro = date('Y-m-d');
 $data1->origem = 'N'; 

 $data1->save();

 $data2 = new Produto;
 $data2->descricao = 'Fanta 600 ML';
 $data2->estoque = 110;
 $data2->preco_custo = 2.29;
 $data2->preco_venda = 3.59;
 $data2->codigo_barras = '987547891234456';
 $data2->data_cadastro = date('Y-m-d');
 $data2->origem = 'N';

 $data2->save();
 
 $busca = Produto::find(1);
 print 'Descrição: ' . $busca->descricao . "<br>";
 print 'Margem de Lucro: ' . $busca->getMargemLucro() . "%<br>";

 $busca->registraCompra(14,5);
 $busca->save();

 }catch(Exception $erro){
 	print $erro->getMessage();
 }

?>