<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'Router.php';

$router = new Router($_SERVER['REQUEST_URI']);
$router->handleRequest();