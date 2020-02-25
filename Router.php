<?php

define("ROUTES",
	[
		"signUp" => 'SignUpController',
		"logIn" => 'LogInController',
		"resetPassword" => 'PasswordResetController',
	]);

class Router {

	private $url;

	public function __construct($url) {
		$this->url = parse_url($url)["path"];
	}

	public function handleRequest() {
		$parts = explode('/', $this->url);
		$controllerKey = $parts[1];
		$action = 'indexAction';
		if (array_key_exists(2, $parts) && !empty($parts[2])) {
			$action = $parts[2].'Action';
		}
		if (array_key_exists($controllerKey, ROUTES)) {
			$controllerName = ROUTES[$controllerKey];
			$controllerFile = 'controllers/'.$controllerName.'.php';
			if (file_exists($controllerFile)) {
				include $controllerFile;
				$controller = new $controllerName();
				if (method_exists($controller, $action)) {
					$controller->$action();
				} else {
					http_response_code(404);
					die();
				}
			}
		} else {
			http_response_code(404);
			die();
		}
	}

}