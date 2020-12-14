<?php

	error_reporting(0);
	//carrega as classes necessárias
	require_once 'classes/api/Expression.php';
	require_once 'classes/api/Criteria.php';
	require_once 'classes/api/Filter.php';

	$arquivo = fopen ('config/estoque.ini', 'r');
	$conexao = mysqli_connect('127.0.0.1', 'root', '', 'trab_pw');
	
	$cmbCampo1 = $_POST['cmbCampo1'];
	$cmbOperador1 = $_POST['cmbOperador1'];
	$valor1 = $_POST['txtValor1'];
	
	$opLogico = $_POST['cmbOpLogico'];

	$cmbCampo2 = $_POST['cmbCampo2'];
	$cmbOperador2 = $_POST['cmbOperador2'];
	$valor2 = $_POST['txtValor2'];


	if(empty($cmbCampo1) OR empty($cmbOperador1) OR empty($valor1))
	{
	?>
		<script>
			window.alert('Verifique se os campos foram preenchidos');
        	document.location.href = 'formBusca.php';
		</script>
	<?php
	}

	if(empty($cmbCampo2) AND empty($cmbOperador2) AND empty($valor2) AND $opLogico == 0)
	{
	?>
		<script>
			window.alert('Para a verificação com 2 critérios de busca, insira o Operador Lógico');
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

		$sql = "SELECT * FROM cliente WHERE $cmbCampo1 $cmbOperador1 '$valor1%' AND $cmbCampo2 $cmbOperador2 '$valor2%'";
		$query = mysqli_query($conexao, $sql);
		print $sql . "<br>";

	}
	
	elseif($opLogico == "OR ")
	{
		$criteria = new Criteria;
		$criteria->add(new Filter('$cmbCampo1', '$cmbOperador1', '$valor1'), Expression::OR_OPERATOR);
		$criteria->add(new Filter('$cmbCampo2', '$cmbOperador2', '$valor2'), Expression::OR_OPERATOR);
		print $criteria->dump() . "<br>";

		$sql = "SELECT * FROM cliente WHERE $cmbCampo1 $cmbOperador1 '$valor1%' OR $cmbCampo2 $cmbOperador2 '$valor2%'";
		$query = mysqli_query($conexao, $sql);
		print $sql . "<br>";
	}

	// Utilizando 1 Critério de Busca

	else
	{
		$criteria = new Criteria;
		$criteria->add(new Filter($cmbCampo1, $cmbOperador1, $valor1));
		print $criteria->dump() . "<br>";

		$sql = "SELECT * FROM cliente WHERE $cmbCampo1 $cmbOperador1 '$valor1%'";
		$query = mysqli_query($conexao, $sql);
		print $sql . "<br>";
	}
	?>

	  <div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
				<th>Nome</th>
				<th>IDADE</th>
				<th>SEXO</th>
				<th>CIDADE</th>
				<th>ESTADO</th>
				<th>TELEFONE</th>
            </tr>
            </thead>
            <?php
        
            while($row = mysqli_fetch_array($query))
            {
            ?>
            <tbody>
			    <tr>
                    <td> <?php echo $row['id']; ?> </a> </td>
				    <td> <?php echo $row['nome']; ?> </td>
				    <td> <?php echo $row['idade']; ?> </td>
                    <td> <?php echo $row['sexo']; ?> </td>
                    <td> <?php echo $row['cidade']; ?> </td>
					<td> <?php echo $row['estado']; ?> </td>
					<td> <?php echo $row['telefone']; ?> </td>
			    </tr>
            </tbody>
            <?php
            }
            ?>
        </table>
	</div>