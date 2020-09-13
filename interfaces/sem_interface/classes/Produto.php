<?php

	/*
		Para exemplificar esse conceito, primeiro faremos uma implementação sem interfaces para depois aplicar o conceito.
	*/

	class Produto
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