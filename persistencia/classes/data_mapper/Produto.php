<?php
	
	/*
		Classe para representar Produto na demonstração do Design Pattern Data Mapper. Fica claro aqui que a classe proposta é uma classe incompleta, pois carece de métodos de negócios... getMargemLucro() e registraCompra
	*/

	class Produto
	{
		private $data;

		function __get($prop)
		{
			return $this->data[$prop];
		}

		function __set($prop, $valor)
		{
			$this->data[$prop] = $valor;
		}
	}
?>