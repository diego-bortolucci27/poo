<?php
	class Produto{
		private static $conn;
		private $data;

		function __get($prop){
			return $this->data[$prop];
		}

		function __set($prop, $value){
			$this->data[$prop] = $value;
		}

		public static function find($id){
			$gateway = new ProdutoGateway;
			return $gateway->find($id, 'Produto');
		}

		public function all($filter = ''){
			$gateway = new ProdutoGateway;
			return $gateway->all($filter, 'Produto');
		}

		public function delete(){
			$gateway = new ProdutoGateway;
			return $gateway->delete($this->id);
		}

		public function save(){
			$gateway = new ProdutoGateway;
			return $gateway->save((object) $this->data);
		}

		public function getMargemLucro(){
			return (($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
		}

		public function registraCompra($custo, $quantidade){
			$this->custo = $custo;
			$this->estoque += $quantidade;
		}
	}
	
?>