<?php
	/*Essa classe basicamente terá o método add(), que adicionará uma nova expressão a uma lista de expressões. A princípio adicionaremos objetos do tipo Filter, podendo formar uma expressão contendo diversos filtros.

	A grande vantagem da classe Criteria é que ela permitirá compor não somente objetos do tipo Filter, mais também objetos Criteria. Como um Criteria pode ser formado por vários Filter, temos aí um caminho para compor expressões recursivamente. Essa formação é um implementação de um Design Pattern chamado Composite, que permite criar um objeto composto, contendo relações todo-parte, de modo que você pode tratar exatamente da mesma forma objetos individuais, bem como objetos compostos. Analise a modelagem "composição de critérios" (Composite Pattern para composição de filtros), criada durante aula, nela é possível notar que um Criteria pode ser composto por uma Expression, que por sua vez pode ser um Filter ou mesmo outro Criteria.

	Depois de utilizarmos o método add() para adicionar filtros (Filter) ou critérios (Critéria), faremos uso do método dump() para converter essa cadeia de expressões no formato de String plana. O método dump() percorrerá a lista de expressões colhendo o retorno da execução do método dump() de cada expressão. Isto é possível porque todas as classes da hierarquia implementam o método dump(), visto que ele é abstrato na classe pai. Ao final, poderemos ter uma cadeia de expressões lógicas como a da figura "Uma expressão composta". Verificar figura na modelagem criada em aula.

	A classe Criteria terá o método add(), que permitirá adicionar qualquer objeto do tipo Expression, que por sua vez poderá ser Criteria ou Filter, adicionando esse objeto ao atributo expressions. O método dump() irá percorrer o vetor expressions, executando o método dump() de cada expressão composta. Neste momento, o dump() executado poderá ser de um objeto da classe Criteria ou Filter. Caso seja da classe Criteria, temos aí uma composição recursiva, o que confere grande poder a essa estrutura.

	Um critério é utilizado em conjunto com algumas instruções como o SELECT. Assim, frequentemente precisamos definir outras características como ordenação (ORDER BY) ou o intervalo da consulta (OFFSET e LIMIT). Para definir tais características, criaremos o método setProperty(), que receberá dois parametros: a propriedade (ORDER, OFFSET, LIMIT) e o seu valor. Para retornar o valor de uma propriedade, utilizaremos o método getProperty(). As propriedades serão armazenadas no array $properties.
	*/
	class Criteria extends Expression {
		private $expressions; //armazena a lista de expressões 
		private $operators; //armazena a lista de operadores 
		private $properties; //propriedades do critério

		function __construct(){
			$this->expressions = array();
			$this->operators = array(); 
		}

		public function add(Expression $expression, $operator = self::AND_OPERATOR) {
			 //NA PRIMEIRA VEZ NÃO PRECISAMOS CONCATENAR
			if(empty($this->expressions)){
				$operator = NULL;
			}
			//AGREGA O RESULTADO DA EXPRESSÃO À LISTA DE EXPRESSÕES
			$this->expressions[] = $expression;
			$this->operators[] = $operator;
		}

		public function dump(){
			//concatena a lista das expressões
			if(is_array($this->expressions)){
				if(count($this->expressions > 0)){
					$result = '';
					foreach ($this->expressions as $i => $expression) {
						$operator = $this->operators[$i];
						//concatena o operador com a respectiva expressão
						$result .= $operator . $expression->dump() . ' ';
					}
					$result = trim($result);
					return "({$result})";
				}
			}
		}

		public function setProperty($property, $value){
			if (isset($value)){
				$this->properties[$property] = $value;
			}else{
				$this->properties[$property] = NULL;
			}
		}

		public function getProperty($property){
			if(isset($this->properties[$property])){
				return $this->properties[$property];
			}
		}
	}
	
?>