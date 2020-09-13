<?php

	/*
		
	*/

	$games = new SplQueue();

	//Acrescentar na fila

	$games->enqueue('The Last of Us');
	$games->enqueue('God of War');
	$games->enqueue('Uncharted');

	foreach ($games as $item)
	{
		print 'Item: ' . $item . '<br>';
	}

	//Remover da Fila

	print "Removendo: " . $games->dequeue() . "<br>";
	print "Restam na fila: " . $games->count();

	print "Removendo: " . $games->dequeue() . "<br>";
	print "Restam na fila: " . $games->count();

	print "Removendo: " . $games->dequeue() . "<br>";
	print "Restam na fila: " . $games->count();
?>