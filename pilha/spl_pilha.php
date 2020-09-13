<?php

	/*
		
	*/

	$consoles = new SplStack();

	//Acrescentando na pilha -> Método push() inclui item na pilha...

	$consoles->push('Nintendo Switch');
	$consoles->push('Playstation 4');
	$consoles->push('Xbox One');

	foreach ($consoles as $item)
	{
		print 'Item: ' . $item . '<br>';
	}

	//Removendo item da Pilha -> Método pop() remove da pilha...

	print "Removendo: " . $consoles->pop() . '<br>';
	print "Restam na pilha: " . $consoles->count() . "<br>";

	print "Removendo: " . $consoles->pop() . '<br>';
	print "Restam na pilha: " . $consoles->count() . "<br>";

	print "Removendo: " . $consoles->pop() . '<br>';
	print "Restam na pilha: " . $consoles->count() . "<br>";
?>