<?php

    class Produto
    {

        // Atributos, geralmente não utilizamos com visibilidade public, por questões de segurança devemos utilizar outra visibilidade como private ou protected. Porém, para nosso exemplo vamos utilizar public, que traz liberdade total ao atributo, somente para fins de compreensão da estrutura da orientação à objetos (Classe - Atributo - Método - Objeto...).
        
        public $descricao;
        public $estoque;
        public $preco;

        // Métodos.
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
                //$this->preco *= ($percentual / 100 + 1);
                $this->preco *= (1 + ($percentual / 100));
            }
        }
    }

    $objeto = new Produto; 
    // Cria uma Instância da classe Produto chamada objeto. É comum falar "Estamos instanciando a classe produto".

    // Alimentando os atributos do Objeto, cujo nome é "objeto".

    $objeto->descricao = 'Coca-Cola 2L';
    $objeto->estoque = 200;
    $objeto->preco = 10;

    // Imprime o objeto, chamado "objeto" estourando na tela os atributos e seus respectivos valores.

    var_dump($objeto);

    $objeto->aumentarEstoque(50);
    print "<br>";
    var_dump($objeto);

    $objeto->diminuirEstoque(20);
    print "<br>";
    echo "O estoque do produto " . $objeto->descricao . " é " . $objeto->estoque;

    echo "<br>";

    $objeto->reajustarPreco(20);
    echo "Preço do Produto " . $objeto->descricao . " é R$" . $objeto->preco;

?>