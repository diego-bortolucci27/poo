<?php
/*
 Neste exemplo, vamos utilizar a nossa classe Active Record (Produto.php), no exemplo poderemos utilizar tanto métodos de persistencia quanto de negócio. O exemplo inicia com a importação da classe Active Record Produto. Uma vantagem desse Design Patern é que uma única classe já resolve todas as questões relativas à tabela manipulada. Após importar a classe, criamos uma conexao ($conn) com o BD, passamos a conexão para o Active Record. Em seguida, buscamos todos os objetos pelo método all() e excluímos um a um pelo método delete(). Logo após, instanciamos os objetos $produto1 e $produto2, definimos vários de seus atributos e salvamos cada um deles pelo método save(). Em seguida, buscamos o produto 1 pelo método find(), exibimos sua descrição e acionamos o método getMatgemLucro() para obter a margem de lucro. Registramos então a compra pelo método registraCompra() e por fim solicitamos a atualização do objeto pelo método save(). Note que executamos métodos de persistência e de negócio sobre o mesmo objeto.
 Esse exemplo é muito parecido, (quase idêntico) ao tdg2, no qual demonstramos a utilização de um objeto de domínio. Isso porque um Active Record também é um objeto de domínio, mas com métodos de persistência próprios.
*/

 require_once 'classes/active_record/Produto.php';
 

 try{
 	$conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=estoque', 'root', '');
 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	Produto::setConnection($conn);

 	$produtos = Produto::all();
 	foreach ($produtos as $produto) {
 		$produto->delete();
 	}

 	$produto1 = new Produto;
 	$produto1->descricao = 'Fanta 2 Litros';
 	$produto1->estoque = 80;
 	$produto1->preco_custo = 3.99;
 	$produto1->preco_venda = 5.99;
 	$produto1->codigo_barras = '123654789123456';
 	$produto1->data_cadastro = date('Y-m-d');
 	$produto1->origem = 'N'; 

 	$produto1->save();

 	$produto2 = new Produto;
 	$produto2->descricao = 'Fanta 600 ML';
 	$produto2->estoque = 110;
 	$produto2->preco_custo = 2.29;
 	$produto2->preco_venda = 3.59;
 	$produto2->codigo_barras = '987547891234456';
 	$produto2->data_cadastro = date('Y-m-d');
 	$produto2->origem = 'N';

 	$produto2->save();
 
 	$busca = Produto::find(1);
 	//$busca->estoque += 50;
 	print 'Descrição: ' . $busca->descricao . "<br>";
 	print 'Margem de lucro: ' . $busca->getMargemLucro() . "%<br>";
 	$busca->registraCompra(14, 5);
 	$busca->save();
 	
 }catch(Exception $erro){
 	print $erro->getMessage();
 }

?>