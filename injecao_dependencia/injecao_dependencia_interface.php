<?php

	require_once 'record.php';

	interface ExporterInterface
	{
		public function export($data);
	}

	class XMLExporter implements ExporterInterface
	{
		public function export($data)
		{
			$data = array_flip($data);
			$xml = new SimpleXMLElement('<record/>');
			array_walk_recursive($data, array($xml, 'addChild'));
			return $xml->asXML();
		}
	}

	class JSONExporter implements ExporterInterface
	{
		public function export($data)
		{
			return json_encode($data);
		}
	}

	/*
		A classe Pessoa terá o método export() que receberá um objeto por injeção de dependência. Esse método receberá um objeto externo($obj_externo), que obrigatoriamente precisará implementar a interface ExporterInterface.

		O método export() utilizará um recurso desse objeto externo. Que é o método export(). Temos a certeza de que o método export() existe no objeto recebido, pois a interface ExporterInterface garante isso.

		Neste exemplo implementaremos a injeção por meio de uma interface. Mas a injeção pode ser implementada no método construtor e também por meio do uso de um método setter para amarzenar a instância externa em uma propiedade.
	*/

	class Pessoa extends Record
	{
		const TABLENAME = 'produtos';

		public function export(ExporterInterface $obj_externo)
		{
			return $obj_externo->export($this->data);
		}
	}

	/*
		Agora vamos criar um objeto e exportá-lo para dois formatos: XML e JSON. Primeiro definiremos alguns atributos. Para exporter em XML, basta executarmos o método export() passando a instância XMLExporter. Em seguida novamente o método export(), mas desta vez passando a instância de JSONExporter para exporter em JSON. 

		Veja que nesse cenário a definição do algoritmo, ou seja, de qual classe irá realizar a exportação dos dados está totalmente na mãos do usuário, o que facilita o controle das ações e permite que ele crie novos algoritmos de exportação conforme sua necessidade.
	*/

	$obj = new Pessoa;
	$obj->nome = 'Cristiano Ronaldo';
	$obj->endereco = 'Rua Portugal';
	$obj->numero = '7';

	print "Exportando para XML: <br>" . $obj->export(new XMLExporter) . "<br>";
	print "Exportando para JSON: <br>" . $obj->export(new JSONExporter) . "<br>";
?>