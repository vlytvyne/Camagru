<?php

define("ROUTES",
	[
		"/signUp" => 'views/SignUpView.php',
		"/logIn" => 'views/LogInView.php',
		"/resetPassword" => 'views/PasswordResetView.php',
		"/profile"
	]);

class Router {

	public function __construct($url) {
		if (array_key_exists($url, ROUTES)) {
			if (file_exists(ROUTES[$url])) {
				require ROUTES[$url];
			}
		} else {
			require ROUTES["/logIn"];
		}
	}

}