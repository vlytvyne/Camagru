<?php

define("ROUTES",
	[
		"signUp" => 'SignUpController',
		"logIn" => 'LogInController',
		"resetPassword" => 'PasswordResetController',
		"profile"
	]);

class Router {

	private $url;

	public function __construct($url) {
		$this->url = parse_url($url)["path"];
	}

	public function getAppropriateController() {
		$parts = explode('/', $this->url);
		$route = "";
		$params = [];
		if (array_key_exists('1', $parts)) {
			$route = $parts[1];
		}
		if (array_key_exists('2', $parts)) {
		    $params = array_slice($parts, 2);
		}
		$controllerName = ROUTES["logIn"];
		if (array_key_exists($route, ROUTES)) {
			$controllerName = ROUTES[$route];
		}
		include 'controllers/'.$controllerName.'.php';
		return new $controllerName($params);
	}

}