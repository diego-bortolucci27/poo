<?php

    require_once "csvParser_retorno_flags.php";

    $csv = new CSVParser('clientes.csv', ';');
    if($csv->parse())
    {
        while($row = $csv->fetch())
        {
            print $row['Cliente'] . " - " . $row['Cidade'] . "<br>";
        }
    }
    else
        print "Erro ao  acessar | ler o arquivo!";
?>