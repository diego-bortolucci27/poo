<?php
/*
Neste exemplo vamos usar uma abordagem um pouco diferente. No lugar de utilizar uma função anônima, vamos registrar um método de uma determinada classe. Neste caso vamos registrar dois métodos de carga: LibraryLoader::loadClass() que buscará por classes no diretório Lib/ e ApplicationLoader::loadClass() que buscará por classes no diretório App. Caso o primeiro método registrado encontre a classe, esta será requisitada (require_once) e o segundo método de carga na fila não será executado. É comum em alguns frameworks existir o autoloader das classes internas do framework, tais como componentes, bem como o autoloader das classes criadas pelo usuário (aplicação). Esse exemplo tenta demonstrar essa carascterística.
*/

spl_autoload_register(array(new LibraryLoader, 'loadClass'));
spl_autoload_register(array(new ApplicationLoader, 'loadClass'));

class LibraryLoader {
	public static function loadClass($class){
		if (file_exists("Lib/{$class}.php")){
			require_once "Lib/{$class}.php";
			return TRUE;
		}
	}
}

class ApplicationLoader{
	public function loadClass($class){
		if (file_exists("App/{$class}.php")){
			require_once "App/{$class}.php";
			return TRUE;
		}
	}
}

?>