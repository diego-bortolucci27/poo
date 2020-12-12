<?php
	/*
	Para não precisarmos mais montar instruções SQL manualmente por meio da concatenação de Strings, vamos criar um mecanismo que permita construir filtros de maneira orientada a objetos. Assim, vamos utilizar o Design Pattern Query Object, que por sua vez é um objeto que representa um critério de consulta à base de dados. No lugar de construirmos um SQL concatenando Strings, vamos criar um filtro usando métodos de um objeto.

	As facilidades no uso do Query Object não estão somente em utilizar o SQL dentro de uma aplicação, mas também em tornar a forma como representamos as expressões mais independente de seu contexto, permitindo-nos reutilizar uma mesma instrução em tabelas e em bancos de dados diferentes.

	A maioria das instruções SQL (com exceção do INSERT) tem um critério de seleção de dados que se traduz em uma cláusula WHERE. É assim com o UPDATE, o DELETE e o SELECT. Tal filtro pode ser uma instrução complexa, composta de operadores lógicos (AND, OR), operadores de comparação (<, >, =, <>), entre outros.

	Até o momento vínhamos escrevendo manualmente expressões de seleção (where coluna='valor'), quando necessário. A partir de agora implementaremos a classe Expression, que servirá de suporte para representar expressões de filtro por meio de um mecanismo totalmente orientado a objetos. Ainda não definimos quais tipos de expressão nossa aplicação suportará, portanto estamos criando uma classe abstrata, a partir da qual iremos derivar os tipos de expressão. A partir dela, contruiremos classes filhas que representam cada um dos tipos de expressão possíveis. Com ela, obrigamos que cada classe filha tenha o método dump(), que será responsável por retornar a expressão definida em forma de String. Ainda nessa classe, aproveitamos para declarar duas constantes que definem os operadores AND e OR.
	
	*/

	abstract class Expression{
		//op lógicos
		const AND_OPERATOR = 'AND ';
		const OR_OPERATOR = 'OR ';

		abstract public function dump();
	}
?>