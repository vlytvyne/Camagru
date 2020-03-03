<?php

include_once 'BaseModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Utils.php';

const SECRET = 'VadymBogVsesvitu';

const RC_INVALID_LINK = 0;
const RC_ALREADY_ACTIVATED = 1;
const RC_SUCCESS = 2;

class SignUpModel extends BaseModel {

	public function createNewUser($username, $email, $password) {
		$this->db->query("INSERT INTO users (`username`, `email`, `password`, `activated`, `receive_emails`, `id`) VALUES (?, ?, ?, '0', '1', NULL)",
			array($username, $email, hash('sha256', $password)));
	}

	public function sendConfirmationEmail($email) {
		$title = 'Sign up confirmation';

		$secret = $this->generateSecret($email);
		$port = $_SERVER['SERVER_PORT'];
		$confirmationLink = "http://localhost:$port/signUp/activation?email=$email&secret=$secret";
		$message = "To confirm account creation please click the following link:\r\n\r\n$confirmationLink";

		sendMail($email, $title, $message);
	}

	public function activateAccount($email, $secret) {
		$emailSecret = $this->generateSecret($email);
		if ($emailSecret != $secret) {
			return RC_INVALID_LINK;
		}
		$users = $this->db->query("SELECT * FROM users WHERE email = ?", array($email));
		if (count($users) == 0) {
			return RC_INVALID_LINK;
		}
		$user = $users[0];
		if ($user['activated'] != 0) {
			return RC_ALREADY_ACTIVATED;
		}
		try {
			$this->db->query("UPDATE users SET activated = true WHERE email = ?", array($email));
		} catch (Exception $exception) {
			return RC_INVALID_LINK;
		}
		return RC_SUCCESS;
	}

	private function generateSecret($email) {
		return hash('sha256', $email.SECRET);
	}

	public function isEmailTaken($email) {
		$users = $this->db->query("SELECT * FROM users WHERE email = ?", array($email));
		return count($users) > 0;
	}

	public function isUsernameTaken($username) {
		$users = $this->db->query("SELECT * FROM users WHERE username = ?", array($username));
		return count($users) > 0;
	}

}