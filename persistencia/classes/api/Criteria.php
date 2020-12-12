<?php
	/*
	Vamos neste arquivo escrever os tipos de expressão que podem existir. O tipo mais simples que podemos imaginar é composto de três partes: um campo, um operador e um valor (ex.: salario > 3000), de modo que salario é o campo, > é o operador e 3000 é o valor a ser comparado. Essa expressão representa um filtro de seleção. Então o filtro é o primeiro tipo de expressão que podemos representar.

	Para implementar um filtro, criamos a classe Filter, que é filha da classe Expression, ou seja, herda da classe Expression. Um objeto Filter receberá em seu método construtor os três parametros (variável, operador e valor) e tratará de armazena-las internamente. No entanto antes de armazenar o valor precisamos tratá-lo, afinal o PHP suporta diversos tipos de dados em uma String plana para que seja montado o SQL final. Esse será o papel do método transform(), que fará vários testes para descobrir o tipo do valor e realizará as conversões necessárias. Isso é necessário porque alguns tipos de dados como o array são representados diferentemente no PHP e no banco de dados. Ao tipo String, por exemplo, devemos adicionar aspas antes de enviar para o banco.
	Importante: notem que aqui não estamos utilizando Prepared Statements, a melhor técnica para prevenção de ataques contra SQL Injection.
	*/
	class Filter extends Expression{
		private $variable; //variável para receber o campo
		private $operator; //operador
		private $value; //valor

		public function __construct($variable, $operator, $value){
			//armazena as propriedades passadas por paramentro ao construtor, inserindo seus dados nos atributos da classe Filter
			$this->variable = $variable;
			$this->operator = $operator;
			
			//transforma o valor de acordo com certas regras de tipo
			$this->value = $this->transform($value);
		}

		private function transform($value){
			//caso seja um array
			if(is_array($value)){
				foreach($value as $x){
					if(is_integer($x)){
						$foo[] = $x;
					}else if(is_string($x)){
						$foo[] = "'$x'";
					}//fecha o else if
				}//fecha o foeach

				//converte o array em string separada por ","
				$result = '(' . implode(',', $foo) . ')';
			}//fecha o if
			else if(is_string($value)){
				$result = "'$value'";
			}
			else if(is_null($value)){
				$result = 'NULL';
			}
			else if(is_bool($value)){
				$result = $value ? 'TRUE' : 'FALSE';
			}
			else {
				$result = $value;
			}
			return $result;
		}//fecha o método transform

		public function dump(){
			//concatena (monta) a expressão
			return "{$this->variable} {$this->operator} {$this->value}";
		}//fecha metodo dump
	}//fecha classe Filter
?>