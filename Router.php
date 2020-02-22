<?php

define("ROUTES",
	[
		"/signUp" => 'SignUpController',
		"/logIn" => 'LogInController',
		"/resetPassword" => 'PasswordResetController',
		"/profile"
	]);

class Router {

	private $url;

	public function __construct($url) {
		$this->url = $url;
	}

	public function getAppropriateController() {
		$controllerName = ROUTES["/logIn"];
		if (array_key_exists($this->url, ROUTES)) {
			$controllerName = ROUTES[$this->url];
		}
		include 'controllers/'.ROUTES[$this->url].'.php';
		return new $controllerName();
	}

}