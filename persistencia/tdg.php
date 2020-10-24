<?php
/*
 Agora vamos usar a classe ProdutoGateway. Neste programa, vamos primeiro importar a classe ProdutoGateway para uso. Em seguida, declaramos 2 objetos planos (stdClass, quando um objeto nao tem classe definida, utiliza stdClass, que é a classe "padrão / plana" do PHP), $data1 e $data2, contendo os dados do produto a ser gravado. Como esses objetos não tem id, serão inseridos(será executado o código que está no if do método save(), da classe ProdutoGateway...). Em seguida, abrimos conexao com a base de dados (new PDO) e passamos essa conexao para o Gateway (setConnection, da classe ProdutoGateway).
 Utilizamos o método save() para gravar cada um dos objetos. Utilizamos o métodos all() (tbm da classe ProdutoGateway) com um filtro para localizar todos objetos com estoque inferior ou igual a 10 unidades.
*/

 require_once 'classes/tdg/ProdutoGateway.php';

 $data1 = new stdClass;
 $data1->descricao = 'Coca-Cola 2 Litros';
 $data1->estoque = 120;
 $data1->preco_custo = 5;
 $data1->preco_venda = 7;
 $data1->codigo_barras = '123654789123456';
 $data1->data_cadastro = date('Y-m-d');
 $data1->origem = 'N'; 

 $data2 = new stdClass;
 $data2->descricao = 'Coca-Cola 600 ML';
 $data2->estoque = 180;
 $data2->preco_custo = 2.59;
 $data2->preco_venda = 3.69;
 $data2->codigo_barras = '987547891234456';
 $data2->data_cadastro = date('Y-m-d');
 $data2->origem = 'I';

 try{
 	$conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=estoque', 'root', '');
 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	ProdutoGateway::setConnection($conn);

 	$gateway = new ProdutoGateway;
 	$gateway->save($data1);
 	$gateway->save($data2);

 	$produto = $gateway->find(1);
 	$produto->estoque += 2;
 	$gateway->save($produto);

 	foreach ($gateway->all("estoque>=10") as $produto) {
 		print $produto->descricao . "<br>";
 	}

 }catch(Exception $erro){
 	print $erro->getMessage();
 }

?>