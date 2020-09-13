<?php
// Cria a classe que gera as propriedades do produto
class Produtos
{
	// Propriedades
	public $nome;
	public $valor;
	
	// Configura as propriedades
	function __construct ( $nome = null, $valor = null ) {
		$this->nome  = $nome;
		$this->valor = $valor;
	}
}

// Cria o carrinho de compras
class CarrinhoCompras
{
	// Pega as propriedades do produto
	public $produtos;
	
	// Configura as propriedades do produto no array $this->produtos
	public function adiciona( Produtos $produto ) {
		$this->produtos[] = $produto;
	}
	
	// Exibe todos os produtos
	public function exibe() {
		foreach ( $this->produtos as $produto ) {
			echo $produto->nome . '<br>';
		}
	}	
}

// Cria duas instâncias da classe Produtos
$produto1 = new Produtos('PlayStation');
$produto2 = new Produtos('Xbox');

// Cria uma instância da classe CarrinhoCompras
$carrinho = new CarrinhoCompras();

// Adiciona os produtos ao carrinho
$carrinho->adiciona( $produto1 );
$carrinho->adiciona( $produto2 );

// Exibe os dados na tela
$carrinho->exibe();
?>