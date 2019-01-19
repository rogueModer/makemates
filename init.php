<?php

require_once __DIR__ . '/functions/function.php';

spl_autoload_register(function($class){
	return require_once __DIR__ . '/classes/' . $class . '.php';
});




 ?>
