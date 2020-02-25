<?php

const POST = 'post';
const GET = 'get';

function protectFromBadRequest($method, ...$keys) {
	$methodArray = null;
	if ($method == POST) {
		$methodArray = $_POST;
	} elseif ($method == GET) {
		$methodArray = $_GET;
	} else {
		throw new Exception("WRONG METHOD IN protectFromBadRequest");
	}

	foreach ($keys as $key) {
		if (!isset($methodArray[$key])) {
			http_response_code(400);
			die();
		}
	}
}
