<?php

    class Produto
    {
        private $descricao;
        private $estoque;
        private $preco;

        // Métodos.
        // Método Construtor
        // Getters (get) e Setters (set) = Métodos de Implementação


        public function __construct($descricao, $estoque, $preco)
        {
            if (is_string($descricao)) 
            {
                $this->descricao = $descricao;
            }

            if(is_numeric($estoque) and $estoque >= 0)
            {
                $this->estoque = $estoque;
            }

            if(is_numeric($preco) and $preco >= 0)
            {
                $this->preco = $preco;
            }

            print "Objeto Contruído" . $descricao . ", estoque: " . $estoque . ", preco: " . $preco;

            echo "<br>";
        }

        public function __destruct()
        {
            print "Objeto Destruído: " . $this->descricao . ", estoque: " . $this->estoque . ", preco: " . $this->preco;
        }

        /*
        public function setDescricao($descricao)
        {
            // Set significa ajuste
            // Set => recebe os dados !!!
            // is_string testa se é um texto ou não.

            if(is_string($descricao))
            {
                $this->descricao = $descricao;
            }
        }
        */

        public function getDescricao()
        {
            // Get => retorna os valores !!!
            return $this->descricao;
        }

        /*
        public function setEstoque($estoque)
        {
            if (is_numeric($estoque) and $estoque >= 0) 
            {
                $this->estoque = $estoque;
            }
        }
        */

        public function getEstoque()
        {
            return $this->estoque;
        }

        /* 
            Exercícios em Aula
            Criar métodos setPreço e getPreço
        */

        /*
        public function setPreco($preco)
        {
            if(is_numeric($preco) and $preco >= 0)
            {
                $this->preco = $preco;
            }
        }
        */
        public function getPreco()
        {
            return $this->preco;
        }


        // Métodos

        public function aumentarEstoque($unidades)
        {   
            // is_numeric = verifica se o que está na variável é um número
            if(is_numeric($unidades) and $unidades >= 0)
                $this->estoque += $unidades;
        }

        public function diminuirEstoque($unidades)
        {
            if(is_numeric($unidades) and $unidades >= 0)
                $this->estoque -= $unidades;
        }
        /* 
            Criar um método com o nome reajustarPreco($percentual), que devera receber um percentual para reajuste, esse percentual deve ser numerico e ter um valor maior ou igual a zero. O método deverá reajustar o preco que está no atributo preço, calculando o novo valor para esse produto, de acordo com o percentual de reajuste informado. O Operador *= deverá ser utilizado para realizar o cálculo.
        */
        public function reajustarPreco($percentual)
        {
            if(is_numeric($percentual) and $percentual >= 0)
            {
                $this->preco *= (1 + ($percentual / 100));
            }
        }
    }

    unset($objeto);

     // Cria uma Instância da classe Produto chamada objeto. É comum falar "Estamos instanciando a classe produto". Nesse caso utilizamos o construtor da classe para instanciar o objeto com "dados nos seus atributos".

    $objeto = new Produto('Chocolate', 5, 4.59); 
   
    /*
    print "Produto Instaciado: " . $objeto->getDescricao();
    print "<br>";
    print "Preço do Produto: " . " é " . number_format($objeto->getEstoque(), 2, ',', '.');

    $objeto->aumentarEstoque(50);
    print "<br>";
    print "O estoque do produto " . $objeto->getDescricao() . " é " . $objeto->getEstoque(); 

    $objeto->diminuirEstoque(20);
    print "<br>";
    print "O estoque do produto " . $objeto->getDescricao() . " é " . $objeto->estoque(); 
    echo "<br>";

    $objeto->reajustarPreco(20);
    //echo "Preço do Produto " . $objeto->descricao . " é R$" . $objeto->preco;
    print "O novo preço do produto é " . $objeto->getDescricao() . " é R$" . $objeto->getPreco();
    */
?>