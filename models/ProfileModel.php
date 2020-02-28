<?php

include_once 'BaseModel.php';

class ProfileModel extends BaseModel {

	public function changeEmail($currentEmail, $newEmail) {
		$this->db->query("UPDATE users SET email = ? WHERE email = ?", array($newEmail, $currentEmail));
	}

	public function changeUsername($currentUsername, $newUsername) {
		$this->db->query("UPDATE users SET username = ? WHERE username = ?", array($newUsername, $currentUsername));
	}

	public function changePassword($username, $password) {
		$hashedPassword = hash('sha256', $password);
		$this->db->query("UPDATE users SET password = ? WHERE username = ?", array($hashedPassword, $username));
	}

	public function changeReceiveEmails($username, $wantReceive) {
		$sqlBool = $wantReceive ? 1 : 0;
		return $this->db->query("UPDATE users SET receive_emails = ? WHERE username = ?", array($sqlBool, $username));
	}
}