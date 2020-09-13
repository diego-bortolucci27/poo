<?php
/*
Neste exemplo temos uma variação do que foi apresentado no exemplo 2, portanto vamos solicitar que determinada classe registre ela mesma o seu método de carregamento de classes. Neste caso, instanciaremos a classe de carga ApplicationLoader e solicitaremos o método register(). O método register () por sua vez, irá executar a função spl_autoload_register() para registrar o método $this->loadClass() como autoloader. Essa abordagem é interessante, pois permite que a classe de carregamento altere nãao somente o algotrimo de carga, mas também o próprio nome do método de carga (loadClass) sem interferir na chamada externa (register).

OBS: Por motimos de simplificação colocamos a declaração da class (ApplicationLoader), bem como sua chamada, no mesmo arqquivo, po´rem essa não é uma boa prática. Na realidade a classe deverá estar localizada em um arquivo próprio, que contenha somente a sua definição, enquanto sua instanciação e consequente chamada (register) normalmente estará no princiál arquivo da aplicação (index.php), já que as requisições para as demais classes do projeto partem dele.
*/

$al = new ApplicationLoader;
$al->register();

class ApplicationLoader{
	public function register(){
		spl_autoload_register(array($this, 'loadClass'));
	}

	public function loadClass($class){
		if (file_exists("App/{$class}.php")){
			require_once "App/{$class}.php";
			return TRUE;
		}
	}
}

?>