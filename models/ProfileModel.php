<?php

include_once 'BaseModel.php';

class ProfileModel extends BaseModel {

	public function changeEmail($userId, $newEmail) {
		$this->db->query("UPDATE users SET email = ? WHERE id = ?", array($newEmail, $userId));
	}

	public function changeUsername($userId, $newUsername) {
		$this->db->query("UPDATE users SET username = ? WHERE id = ?", array($newUsername, $userId));
	}

	public function changePassword($userId, $password) {
		$hashedPassword = hash('sha256', $password);
		$this->db->query("UPDATE users SET password = ? WHERE id = ?", array($hashedPassword, $userId));
	}

	public function changeReceiveEmails($userId, $wantReceive) {
		$sqlBool = $wantReceive ? 1 : 0;
		return $this->db->query("UPDATE users SET receive_emails = ? WHERE id = ?", array($sqlBool, $userId));
	}
}