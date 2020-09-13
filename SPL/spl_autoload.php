<?php
/*
A 1ª função para realizar o carregamento automático de classes foi a __autoload(). Com surgimento da SPL, um conjunto padronizado de classes e interfaces que veremos mais adinate, surge tbm uma nova forma de registrar funções ou métodos de carga, a spl_autoload_register(). A spl_autoload_register() é uma função que permite registrar vários métodos que o PHP IRÁ COLOCAR EM UMA FILA E EXECUTAR QUANDO A CLASSE FOR REQUISITADA E AINDA NÃO ESTIVER CARREGADA NA APLICAÇÃO. Cada um desses métodos pode ter um algoritmo diferente para avaliar e localizar a classe a ser carregada.

A vantagem da spl_autoload_register() em relação a __autoload() é que a primeira permite registrar várias funções de carregamento. Além disso, permite registrar um método de um classe, o que facilita uma implementação mais orientada a objetos. O uso da __autoload() já não é mais indicado e a função pode ser marcada como DEPRECATED (deixar de ser suportada), no futuro.

A função spl_resgister() aceita um parametro do tipo "Callable" ("Chamável", algo que possa ser chamado...), que pode ser um método de objeto, uma função identificada ou também uma função anônima. Neste exemplo vamos demonstrar como registrar uma função anônima como autoloader. A função irá sempre receber o nome da classe requisitada. Neste caso ela verificará se a classe existe no diretório App com o sufico ".php". Caso exista, será requisitada com o require_once. Assim que o programa chegar na linha em que o objeto da classe Pessoa é instanciado (new Pessoa), automaticamente a função anônima será executada recebendo o nome da classe em questão (Pessoa) como parametro.
*/

spl_autoload_register( function($class){
	if (file_exists("App/{$class}.php")){
		require_once "App/{$class}.php";
		return TRUE;
	}
});

var_dump(new Pessoa);
?>