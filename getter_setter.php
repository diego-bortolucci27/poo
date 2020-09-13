<?php

    class Produto
    {

        /*
            Atributos, geralmente não utilizamos com visibilidade public, por questões de segurança devemos utilizar outra visibilidade como private ou protected. 
        
            public $descricao;
            public $estoque;
            public $preco;
        */

        private $descricao;
        private $estoque;
        private $preco;

        // Métodos.
        // Getters (get) e Setters (set) = Métodos de Implementação

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

        public function getDescricao()
        {
            // Get => retorna os valores !!!
            return $this->descricao;
        }

        public function setEstoque($estoque)
        {
            if (is_numeric($estoque) and $estoque >= 0) 
            {
                $this->estoque = $estoque;
            }
        }

        public function getEstoque()
        {
            return $this->estoque;
        }

        /* 
            Exercícios em Aula
            Criar métodos setPreço e getPreço
        */

        public function setPreco($preco)
        {
            if(is_numeric($preco) and $preco >= 0)
            {
                $this->preco = $preco;
            }
        }

        public function getPreco()
        {
            return $this->preco;
        }



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

    $objeto = new Produto; 
    // Cria uma Instância da classe Produto chamada objeto. É comum falar "Estamos instanciando a classe produto".

    // Alimentando os atributos do Objeto, cujo nome é "objeto".

    $objeto->setDescricao('Coca-Cola 2L');
    $objeto->setEstoque(200);
    $objeto->setPreco(6);

    //$objeto->descricao = 'Coca-Cola 2L';
    //$objeto->estoque = 200;
    //$objeto->preco = 7;

    // Imprime o objeto, chamado "objeto" estourando na tela os atributos e seus respectivos valores.

    var_dump($objeto);
    print_r($objeto);

    $objeto->aumentarEstoque(50);
    print "<br>";
    var_dump($objeto);

    $objeto->diminuirEstoque(20);
    print "<br>";
    //echo "O estoque do produto " . $objeto->descricao . " é " . $objeto->estoque;
    print "O estoque do produto " . $objeto->getDescricao() . " é " . $objeto->getEstoque();
    echo "<br>";

    $objeto->reajustarPreco(20);
    //echo "Preço do Produto " . $objeto->descricao . " é R$" . $objeto->preco;
    print "O novo preço do produto é " . $objeto->getDescricao() . " é R$" . $objeto->getPreco();
?>