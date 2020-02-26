<?php

include_once 'BaseModel.php';

const SECRET = 'PryvitVitayuTebeVsiogoNajkrachogo';

class PasswordResetModel extends BaseModel {

	public function sendPasswordResetEmail($email) {
		$secret = $this->generateSecret($email);
		$confirmationLink = "http://localhost:80/resetPassword/enterNewPassword?email=$email&secret=$secret";

		$to      = $email;
		$subject = 'Camagru password reset';
		$message = "To reset password please click the following link:\n\n$confirmationLink";
		$headers = 'From: camagru@camagru.com' . "\r\n" .
			'Reply-To: camagru@camagru.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);
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