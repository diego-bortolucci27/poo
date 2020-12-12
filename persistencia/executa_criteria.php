<?php

	require_once 'classes/api/Expression.php';
	require_once 'classes/api/Criteria.php';
	require_once 'classes/api/Filter.php';

	$criteria = new Criteria;
	$criteria->add(new Filter('idade', '<', 16), Expression::OR_OPERATOR);
	$criteria->add(new Filter('idade', '>', 60), Expression::OR_OPERATOR);
	print $criteria->dump() . "<br>";

	$criteria = new Criteria;
	$criteria->add(new Filter('idade', 'IN'));

	$criteria = new Criteria;
	$criteria->add(new Filter('nome', 'like', 'pedro%'), Expression::OR_OPERATOR);
	$criteria->add(new Filter('nome', 'like', 'maria%'), Expression::OR_OPERATOR);
	print $criteria->dump() . '<br>';

	// Critério simples AND e filtros usando IS NOT NULL

	$criteria = new Criteria;
	$criteria->add(new Filter('telefone', 'IS NOT', NULL));
	$criteria->add(new Filter('sexo', '=', 'F'));
	print $criteria->dump() . "<br>";

	$criteria = new Criteria;
	$criteria->add(new Filter('UF', 'IN', array('RS', 'SC', 'PR')));
	$criteria->add(new Filter('UF', 'NOT IN', array('AC', 'PI')));
	print $criteria->dump() . "<br>";

	$criteria1 = new Criteria;
	$criteria1->add(new Filter('sexo', '=', 'F'));
	$criteria1->add(new Filter('idade', '>', '18'));

	$criteria2 = new Criteria;
	$criteria2->add(new Filter())
?>