<?php

function protectFromBadRequest($methodArray, ...$keys) {
	foreach ($keys as $key) {
		if (!isset($methodArray[$key])) {
			http_response_code(400);
			die();
		}
	}
}

function redirect($url, $statusCode = 303) {
	header('Location: ' . $url, true, $statusCode);
	die();
}

function protectFromAuthorizedUser() {
	if (isset($_SESSION['user'])) {
		http_response_code(400);
		die();
	}
}

function protectFromUnauthorizedUser() {
	if (!isset($_SESSION['user'])) {
		http_response_code(401);
		die();
	}
}

function sendMail($email, $title, $message) {
	$encoding = "utf-8";
	$from_name = 'Camagru support';
	$from_mail = 'camagru@camagru.com';
	$mail_subject = $title;
	$mail_to = $email;
	$mail_message = $message;

	// Set preferences for Subject field
	$subject_preferences = array(
		"input-charset" => $encoding,
		"output-charset" => $encoding,
		"line-length" => 400,
		"line-break-chars" => "\r\n"
	);

	// Set mail header
	$header = "Content-type: text/html; charset=".$encoding." \r\n";
	$header .= "From: ".$from_name." <".$from_mail."> \r\n";
	$header .= "MIME-Version: 1.0 \r\n";
	$header .= "Content-Transfer-Encoding: 8bit \r\n";
	$header .= "Date: ".date("r (T)")." \r\n";
	$header .= iconv_mime_encode("Subject", $mail_subject, $subject_preferences);

	// Send mail
	mail($mail_to, $mail_subject, $mail_message, $header);
}