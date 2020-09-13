<?php

	/*
		Temos aqui a implementação utilizando interfaces. Essa classe faz a implementação do conteúdo da interface (método getPreco()). Utilizamos a palavra-chave (palavra reservada) "implements" entre o nome da classe e o nome da interface que ela implementa. Uma classe pode implementar várias interfaces, que devem ser separadas por vírgula. É indispensável que esta classe implemente o método getPreco(), caso contrário uma falha de execução ocorrerá.
	*/

	require_once 'classes/OrcavelInterface.php';

	class Produto implements OrcavelInterface
	{
		private $descricao;
		private $estoque;
		private $preco;

		public function __construct($descricao, $estoque, $preco)
		{
			$this->descricao = $descricao;
			$this->estoque = $estoque;
			$this->preco = $preco;
		}

		public function getPreco()
		{
			return $this->preco;
		}
	}
?>