<?php

    /*
        Atributo Estático é aquele que pertence a uma classe e não a um objeto específico; são dinâmicos como os atributos de um objeto, mas estão relacionados à classe. Como a classe é a estrutura comum a todos os objetos dela derivados, atributos estáticos são compartilhados entre todos objetios de uma mesma classe. Um atributo estático conserva seu valor em nível de classe, ou seja, seu valor não está vinculado a um objeto específico. Para acessar um atributo estático, utlizamos self::atributo, quando estamos estamos dentro de uma classe e Classe::atributo, quando acessado de fora da classe. Além disso é necessário informar o modificador static na frente de seu nome.
    */

    class Software
    {
        private $id;
        private $nome;
        private static $contador;

        function __construct($nome)
        {
            self::$contador ++;

            $this->id = self::$contador;
            $this->nome = $nome;
            print "Software " . $this->id . " | " . $this->nome . "<br>";
        }

        public static function getContador()
        {
            return self::$contador;
        }

    } // Fecha a Classe

    new Software('Google Chrome');
    new Software('Spotify');
    new Software('Steam');

    echo 'Quantidade de Softwares cadastrados: ' . Software::getContador();
?>