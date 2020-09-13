<?php

	/*
		Injeção de dependência é um padrão de projetos que permite implementar a inversão de controle. Inversão de controle é um padrão de desenvolvimento, no qual o controle de execução (chamadas) é invertido.
		
		Basicamente, no lugar dos objetos criarem diretamente dependência em relação as classes externas, passamos as dependências por meio de métodos setters para que então eles sejam utilizados (consumidos).

		A injeção de dependência trata de fornecer objetos com funcionalides (quando necessário), no lugar de utilizá-los diretamente. 

		Se por um lado a injeção de dependência deixa o código mais desacoplado, por outro lado seu uso em excesso pode levar a um tempo maior na implementação de novas funcionalides.

		No exemplo a seguir escreveremos nosso algorítmo de exportação para JSON como uma classe externa. Além disso, escreveremos o método toJSON() na classe Pessoa. Basicamente o método toJSON() instanciará a classe JSONExporter e executará seu método export() sobre os dados ($this->data). Qual o problema dessa forma de trabalhar? Independentemente da classe Pessoa declarar ométodo toJSON() ou usar o TRAIT para importar a funcionalidade, é ela que dita algorítmo de exportação a ser utilizado. Assim ela cria dependência a está fortemente acoplada à classe JSONExporter.

		Como resolver esse acoplamento forte, ou seja, como desacoplar, ou ainda minimizar o acoplamento?

		A solução será invés de utilizar diretamente a classe, criar um método dentro da classe Pessoa chamado export(), que receberá o algoritmo de exportação por meio de um parâmetro e irá rodar a exportação. Mas antes disso vamos criar dois algoritmos de exportação: o 1º chamado XMLExporter, que irá exportar um vetor em XML, e outro, JSONExporter, que irá exportar um vetor em JSON. Ambas as classes implementação a interface ExporterInterface, que por sua vez conterá somente a definição do método export(). Esta solução está implementada no arquivo injecao_dependencia_interface
	*/

	require_once 'record.php';

	class JSONExporter
	{
		public function export($data)
		{
			return json_encode($data);
		}
	}

	class Pessoa extends Record
	{
		const TABLENAME = 'pessoa';
		public function toJSON()
		{
			$obj_json = new JSONExporter;
			return $obj_json->export($this->data);
		}
	}

	$obj_pessoa = new Pessoa;
	$obj_pessoa->nome = 'Rafael Nadal';
	$obj_pessoa->endereco = 'Rua Espanha';
	$obj_pessoa->numero = '10';

	print $obj_pessoa->toJSON();
?>