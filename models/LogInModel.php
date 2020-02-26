<?php

include_once 'BaseModel.php';

class LogInModel extends BaseModel {

	function getUser($username, $password) {
		$hashedPassword = hash('sha256', $password);
		$result = $this->db->query("SELECT * FROM users WHERE username = ? AND password = ? AND activated = true", array($username, $hashedPassword));
		if (count($result) == 0) {
			return false;
		} else {
			return $result[0];
		}
	}
}
