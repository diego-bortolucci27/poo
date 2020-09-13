<?php

    require_once 'conta.php';
    require_once 'contaPoupanca.php';
    require_once 'contaCorrente.php';

    // Criação de Objetos...

    $contas[] = new ContaCorrente(1, "CC.1234.56", 100, 500);
    $contas[] = new ContaPoupanca(2, "PP.1234.57", 100);

    // Percorre as contas criadas...

    foreach ($contas as $key=>$conta)
    {
        print "Conta: " . $conta->getInfo();
        echo "<br>";
        print "Saldo atual: " . $conta->getSaldo();
        echo "<br>";
        $conta->depositar(200);
        print "Depósito de: 200" . "<br>";
        print "Saldo atual: " . $conta->getSaldo();
        echo "<br>";

        if($conta->retirar(700))
            print "Retirada de 700" . "<br>";
        else
            print "Retirada de 700 não permitido !" . "<br>";
        print "Saldo Atual: " . $conta->getSaldo();
    }
?>