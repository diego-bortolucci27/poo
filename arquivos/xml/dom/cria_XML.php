<?php

	/*
		Vamos demonstrar como criar um documento XML, contendo uma base de dados no mesmo estilo que o documento do arquivo manipula_DOM.php.

		Inicialmente vamos instanciar um objeto da class DOMDocument. Vamos ligar o atributo formatOutput para que o output seja formatado com quebras de linhas e identações. Em seguida usaremos o método createEelement() para criar um nodo.

		Nesse caso criaremos o nodo bases e adicionaremos a ele o nodo base pelo método appendChild(). Além disso, criaremos um atributo id, contendo o valor 1, e o adicionaremos ao nodo base.

		Em seguida adicionaremos ao nodo base uma sérue de nodos filhos por meio do método appendChild(), e cada nodo conterá um atributo e valor (ex: <name>teste</name).

		Por fim utilizaremos o método saveXML() para obter o retorno formatado do documento criado em memória por meio da composição de objetos (composição é um tipo de relacionamento entre classes e objetos, muito utilizado na orientação objetos...).
	*/

	$dom = new DOMDocument('1.0', "UTF-8");
	$dom->formatOutput = true;

	$bases = $dom->createElement('bases');
	$base = $dom->createElement('base');
	$bases->appendChild($base);

	$attr = $dom->createAttribute('id');
	$attr->value = '1';
	$base->appendChild($attr);

	//Insere os elementos filhos de base (atributos da base) e seus valores...

	$base->appendChild($dom->createElement('name', 'teste'));
	$base->appendChild($dom->createElement('host', '192.168.0.1'));
	$base->appendChild($dom->createElement('type', 'mysql'));
	$base->appendChild($dom->createElement('user', 'mary'));

	//Gera a estrutura XML e printa na tela...

	echo $dom->saveXML($bases);
?>