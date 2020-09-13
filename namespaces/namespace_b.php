<?php

	namespace Components;

	class Form{}

	class Field{}

	/*
		Como já temos os 2 namespaces isolados em arquivos separados, vamos criar um terceiro arquivo, que vai importar o arquivo namepace_a.php. Para utilizar a classe Application\Form, utilizaremos o operador "use". O que esse operador basicamente faz é dizer para o PHP: "Use aquela classe daquele Namespace". 

		A partir desse ponto é entendido simplesmente que Form na verdade deve ser na verdade a partir de Application\Form. Veja que segundo var_dump() resultara em erro. Isso se dará porque não usaremos o comando "use", e o PHP buscará a classe Field a partir do escopo global \, onde ela não existe.
	*/


?>