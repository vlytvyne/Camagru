<?php

include_once 'BaseModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Utils.php';

const SECRET = 'PryvitVitayuTebeVsiogoNajkrachogo';

class PasswordResetModel extends BaseModel {

	public function sendPasswordResetEmail($email) {
		$title = 'Camagru password reset';

		$secret = $this->generateSecret($email);
		$port = $_SERVER['SERVER_PORT'];
		$confirmationLink = "http://localhost:$port/resetPassword/enterNewPassword?email=$email&secret=$secret";
		$message = "To reset password please click the following link:\r\n\r\n$confirmationLink";

		sendMail($email, $title, $message);
	}

	public function isSecretValid($email, $secret) {
		$rightSecret = $this->generateSecret($email);
		return $rightSecret == $secret;
	}

	private function generateSecret($email) {
		return hash('sha256', $email.SECRET);
	}

	public function setNewPassword($email, $newPassword) {
		$hashedPassword = hash('sha256', $newPassword);
		$this->db->query("UPDATE users SET password = ? WHERE email = ?", array($hashedPassword, $email));
	}

}