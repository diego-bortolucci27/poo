<?php
	/*
	Vamos criar algumas classes simples. Inicialmente precisamos de uma classe para representar um produto. Fica claro aqui que a classe proposta é uma classe incompleta, pois carece de métodos de negócio getMargemLucro() e registraCompra($custo, $quantidade).
	*/
	class Produto{
		private $data;

		function __get($prop){
			return $this->data[$prop];
		}

		function __set($prop, $valor){
			$this->data[$prop] = $valor;
		}
	}
?>