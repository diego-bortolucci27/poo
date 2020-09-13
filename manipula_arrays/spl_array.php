<?php

	// Manipula Array com SPL
	
	$dados = ['Barcelona', 'Real Madrid', 'Palmeiras', 'Manchester City', 'Juventus', 'Arsenal', 'Bayern', 'Liverpool'];

	$objArray = new ArrayObject($dados);

	// Acrescentar Item

	$objArray->append('Manchester United');

	// Obtem posição 6

	print 'Posição 6: ' . $objArray->offsetGet(6) . '<br>';

	// Troca o dado que esta na posição 6

	$objArray->offsetSet(6, 'Atlético de Madrid');
	print 'Posição 6: ' . $objArray->offsetGet(6) . '<br>';

	// Elimina a Posição 5

	$objArray->offsetUnset(5);

	print "Imprimindo os dados (Elementos) do vetor objArray...<br><br>";

	// Testa se uma posição existe

	if($objArray->offsetExists(10))
		echo 'Posição 10 encontrada!' . '<br>';
	else
		echo 'Posição 10 não encontrada!' . '<br>';
	
	print 'Total de itens: ' . $objArray->count() . '<br>';

	// Acrescenta um item também desta forma:

	$objArray[] = 'Borussia Dortmund';
	$objArray->natsort($objArray); // Ordena os itens dentro do array

	print "<br><br>Imprimindo os dados (Elementos) do vetor objArray...<br><br>";

	// Percorre os dados

	foreach ($objArray as $item)
	{
		print 'Time: ' . $item . '<br>';
	}

	// Para serializar os dados do array sendo instância de ArrayObject, ou seja, sendo do tipo ArrayObject...

	print "<br><br>Imprimindo os dados serializados (Elementos) do vetor objArray...<br><br>";
	print $objArray->serialize();
?>