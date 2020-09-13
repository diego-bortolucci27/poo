<?php
	
	require_once 'namespaces.php';

	use Application\Form;

	var_dump(new \Application\Form); //object(Application\Form)

	var_dump(new \Application\Field); // Fatal error: Class 'Field' not found...
?>