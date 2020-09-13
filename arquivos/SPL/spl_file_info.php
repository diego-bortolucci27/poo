<?php

	/*
		Usando SPL, não precio criar uma classe com atributos e métodos própios podemos usar as classes SPL que já estão prontas. As classes SPLFileInfo e do arquivo, tamanho, extensão, conseguimos obter com classe SPLFileInfo... SPLFileObject, traz maneiras para manipular arquivos com orientação a objetos, assim a classe SPLFileObject estende a classe SPLFileInfo, com isso além de oferecer recursos de manipulção de arquivos, ela também traz recursos para obter informações e permite escrever novos arquivos a partir de um conteúdo existente em arquivo no qual obtive informações.
	*/

	$file = new SPLFileInfo('spl_file_info.php');

	print 'Nome: ' . $file->getFileName() . '<br>';
	print 'Extensão: ' . $file->getExtension() . '<br>';
	print 'Tamanho: ' . $file->getSize() . '<br>';
	print 'Caminho: ' . $file->getRealPath() . '<br>';
	print 'Tipo: ' . $file->getType() . '<br>';
	print 'Gravação: ' . $file->isWritable() . '<br>';
?>