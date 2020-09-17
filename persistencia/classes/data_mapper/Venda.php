<?php
	
	/*
		A classe venda possui métodos para atribuir e retornar um ID, bem como adicionar (addItem)
	*/

	class Venda
	{
		private $id;
		private $itens;

		public function setId($id)
		{
			$this->id = $id;
		}

		public function getId()
		{
			return $this->id;
		}

		public function addItem($quantidade, Produto $produto)
		{
			$this->itens[] = array($quantidade, $produto);
		}
	}

?>