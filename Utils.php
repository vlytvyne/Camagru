<?php

function protectFromBadRequest($methodArray, ...$keys) {
	foreach ($keys as $key) {
		if (!isset($methodArray[$key])) {
			http_response_code(400);
			die();
		}
	}
}

function redirect($url, $statusCode = 303)
{
	header('Location: ' . $url, true, $statusCode);
	die();
}