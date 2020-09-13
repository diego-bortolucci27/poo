<?php

    require_once "csvParser.php";

    $csv = new CSVParser('clientes.csv', ';');
    $csv->parse();

    while($row = $csv->fetch())
    {
        print $row['Cliente'] . " - " . $row['Cidade'] . "<br>";
    }

?>