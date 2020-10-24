<?php

	/*
		Aqui implementamos a classe Record, em seu método construtor, podemos passar opcionalmente o ID de um objeto. Neste caso, o objeto correspondente será carregado automaticamente por meio método load(), que retorna um objeto. Se houver algum objeto retornado, este é convertido em um array (toArray) para depois alimentar o objeto atual (fromArray). Esses métodos ainda serão criados, durante o desenvolvimento de todo projeto.
	*/

	abstract class Record
	{
		protected $data; // Um array contendo os dados (atributos ou propiedades) do objeto

		public function __construct($id = NULL);
		{
			if($id)
			{
				// Se o id for informado, carrega o objeto correspondente
				$object = $this->load($id);
				if ($object)
				{
					$this->fromArray($object->toArray());
				}
			}
		}

		/*
			O método __clone() será executado sempre que um objeto for clonado. Nesses casos em que um Active Record é clonado, ele deve manter todas as suas propiedades, com exceção de seu ID, por isso estamos limpando(usando unset()), o id do clone. Caso mantívessemos o mesmo ID, teríamos 2 objetos Active Record com mesmo ID no sistema, o que causaria erros de persistência do objeto. Limpar o ID fará com que um novo ID seja gerado para o clone no momento em que ele for persistido na base de dados.
		*/

		public function __clone()
		{
			unset($this->data['id']);
		}

		/*
			Senpre que um valor for atribuído a uma propiedade do objeto, o método __set() será executado, interceptando essa atribuição, pois a propiedade em questão não estará definida. O valor a ser atribuído será armazenado no array $data, indexando pelo nome da propiedade. Antes disso, porém será verificada a existência de um método nomeado por set_<propiedade> definido pelo usuário (por meio da função method_exists). Caso esse método exista, ele terá prioridade de execução. Veremos, na seção "Encapsulamento", como o usuário poderá definir métodos para proteger atribuição de valores.
		*/

		public function __set($prop, $value)
		{
			if(method_exists($this, 'set_' . $prop))
			{
				// Executar o método set_<propiedade>
				call_user_func(array($this, 'set_'.$prop), $value);
			}
			else
			{
				if($value === NULL)
				{
					unset($this->data[$prop]);
				}
				else
				{
					$this->data[$prop] = $value; // Atribui o valor da propiedade
				}
			}
		}

		/*
			Sempre que uma propiedade for requisitada, o método __get() será executado. O valor da propiedade será lido a partir do array $data, mas, antes disso, será verificada a existência de um método nomeado por get_<propiedade> definido pelo usuário. Caso esse método exista, ele será executado no lugar.
		*/

		public function __get($prop)
		{
			if(method_exists($this, 'get_'.$prop))
			{
				// Executa o método get_<propiedade>
				return call_user_func(array($this, 'get_'.$prop));
			}
			else
			{
				if(isset($this->data[$prop]))
				{
					return $this->data[$prop];
				}
			}
		}

		/*
			Também precisaremos definir um método _isset() que será executado automaticamente sempre que um programador testar a presença de um valor no objeto, como ao utilizar a função isset().
		*/

		public function __isset($prop)
		{
			return isset($this->data[$prop]);
		}

		/*
			Segundo nossa modelagem UML da classe Record, temos o método getEnity(). Esse método é responsável por retornar o nome da tabela na qual o Active Record será persistido. Para tal, ele verifica a existência de uma constante de classe chamada TABLENAME na classe Active Record. O método getEnity() retornará exatamente o conteúdo dessa constante por meio da função constant(), que cumpre esse papel.
		*/

		private function getEnity()
		{
			$class = get_class($this); // Obtém o nome de classe
			return constant("{$class}::TABLENAME"); // Retorna a constante de classe TABLENAME, assim teremos o nome da "entidade", ou seja tabela em que os dados são persistidos
		}

		/*
			O método fromArray() será utilizado para preencher os atributos de um Active Record com os dados de um array, de modo que os índices desse array são atribuidos do objeto.
		*/

		public function fromArray($data)
		{
			$this->data = $data;
		}

		/*
			O método toArray() será utilizado para retornar todos os atributos de um objeto (armazenados na propiedade $data) em forma de array.
		*/

		public function toArray()
		{
			return $this->data;
		}
	}
?>