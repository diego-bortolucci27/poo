<?php
	error_reporting(0);
	//carrega as classes necessárias
	require_once 'classes/api/Expression.php';
	require_once 'classes/api/Criteria.php';
	require_once 'classes/api/Filter.php';

	$cmbCampo1 = $_POST['cmbCampo1'];
	$cmbOperador1 = $_POST['cmbOperador1'];
	$valor1 = $_POST['valor1'];
	
	$opLogico = $_POST['cmbOpLogico'];

	$cmbCampo2 = $_POST['cmbCampo2'];
	$cmbOperador2 = $_POST['cmbOperador2'];
	$valor2 = $_POST['valor2'];


	if(empty($cmbCampo1) AND empty($cmbOperador1) AND empty($valor1))
	{
	?>
		<script>
			window.alert('Verifique se os campos foram preenchidos');
        	document.location.href = 'formBusca.php';
		</script>
	<?php
	}

	// Utilizando 2 critérios

	if($opLogico == "AND ")
	{
		$criteria = new Criteria;
		$criteria->add(new Filter('$cmbCampo1', '$cmbOperador1', $valor1));
		$criteria->add(new Filter('$cmbCampo2', '$cmbOperador2', $valor2));
		print $criteria->dump() . "<br>";
	}
	
	if($opLogico == "OR ")
	{
		$criteria = new Criteria;
		$criteria->add(new Filter('$cmbCampo1', '$cmbOperador1', '$valor1'), Expression::OR_OPERATOR);
		$criteria->add(new Filter('$cmbCampo2', '$cmbOperador2', '$valor2'), Expression::OR_OPERATOR);
		print $criteria->dump() . "<br>";
	}

	// Utilizando 1 Critério de Busca

	$criteria = new Criteria;
	$criteria->add(new Filter('$cmbCampo1', '$cmbOperador1', '$valor1'));

	//critério simples com AND e filtros com vetores de inteiros
	$criteria = new Criteria;
	$criteria->add(new Filter('idade', 'IN', array(24, 25, 26)));
	$criteria->add(new Filter('idade', 'NOT IN', array(10)));
	print $criteria->dump() . "<br>";

	//critério simples com OR e filtros com LIKE
	$criteria = new Criteria;
	$criteria->add(new Filter('nome', 'like', 'pedro%'), Expression::OR_OPERATOR);
	$criteria->add(new Filter('nome', 'like', 'maria%'), Expression::OR_OPERATOR);
	print $criteria->dump() . "<br>";

	//critério simples com AND e filtros usando IS NOT NULL e "="
	$criteria = new Criteria;
	$criteria->add(new Filter('telefone', 'IS NOT', NULL));
	$criteria->add(new Filter('sexo', '=', 'F'));
	print $criteria->dump() . "<br>";

	//Critério Simples com AND e filtros usando IN/NOT IN sobre vetores de strings
	$criteria = new Criteria;
	$criteria->add(new Filter('UF', 'IN', array('RS', 'SC', 'PR')));
	$criteria->add(new Filter('UF', 'NOT IN', array('AC', 'PI')));
	print $criteria->dump() . "<br>";

	//Criteria simples que será utilizado para compor o criteria composto
	$criteria1 = new Criteria;
	$criteria1->add(new Filter('sexo', '=', 'F'));
	$criteria1->add(new Filter('idade', '>', '18'));

	//Criteria simples que será utilizado para compor o criteria composto
	$criteria2 = new Criteria;
	$criteria2->add(new Filter('sexo', '=', 'M'));
	$criteria2->add(new Filter('idade', '<', '16'));

	//formação de um critério composto
	$criteria = new Criteria;
	$criteria->add($criteria1, Expression::OR_OPERATOR);
	$criteria->add($criteria2, Expression::OR_OPERATOR);
	print $criteria->dump() . "<br>";


	
?>