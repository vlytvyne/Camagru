<?php

include_once 'BaseController.php';

const SECRET = 'VadymBogVsesvitu';

class SignUpController extends BaseController {

	public function renderPage() {
		if ($this->isConfirmation()) {
			$this->sendConfirmationEmail();
			include 'views/EmailConfirmationView.php';
		} else if ($this->isActivation()) {
			include 'views/AccountActivationView.php';
		} else {
			include 'views/SignUpView.php';
		}
	}

	private function isConfirmation() {
		return $this->safeParamExtraction(0) === "confirmation" &&
			$_SERVER['REQUEST_METHOD'] == 'POST';
	}

	private function isActivation() {
		return $this->safeParamExtraction(0) === "activation" &&
			isset($_GET['email']) &&
			isset($_GET['secret']);
	}

	private function sendConfirmationEmail() {
		$secret = md5($_POST['email'].SECRET);
		$confirmationLink = "http://localhost:80/signUp/activation?email={$_POST['email']}&secret=$secret";

		$to      = $_POST['email'];
		$subject = 'Camagru account creation';
		$message = "To confirm account creation please click the following link:\n\n$confirmationLink";
		$headers = 'From: camagru@camagru.com' . "\r\n" .
			'Reply-To: camagru@camagru.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);
	}
}