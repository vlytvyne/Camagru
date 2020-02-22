<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

//spl_autoload_register(function ($class) {
//	$path = str_replace('\\', '/', $class.'.php');
//	if (file_exists($path)) {
//		require_once $path;
//	}
//});

require_once 'Router.php';

$router = new Router($_SERVER['REQUEST_URI']);
$controller = $router->getAppropriateController();
$controller->renderPage();