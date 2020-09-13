<?php

    class Pessoa
    {
        private $nome;
        private $genero;

        const GENEROS = array('M'=>'Masculino', 'F'=>'Feminino');

        public function __construct($nome, $genero)
        {
            $this->nome = $nome;
            $this->genero = $genero;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function getNomeGenero()
        {
            return self::GENEROS[$this->genero];
        }
    }

    $pessoa1 = new Pessoa('Marta', 'F');
    $pessoa2 = new Pessoa('Messi', 'M');

    print 'Nome: ' . $pessoa1->getNome() . "<br>";
    print 'Gênero: ' . $pessoa1->getNomeGenero() . "<br>";
    print 'Nome: ' . $pessoa2->getNome() . "<br>";
    print 'Gênero: ' . $pessoa2->getNomeGenero() . "<br>";

    print_r(Pessoa::GENEROS);

?>