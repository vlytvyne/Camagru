<?php

include_once 'BaseModel.php';

class PhotoBoothModel extends BaseModel {

	function savePhoto($imgBase64) {
		$imgBase64 = str_replace('data:image/png;base64,', '', $imgBase64);
		$imgBase64 = str_replace(' ', '+', $imgBase64);
		$imgData = base64_decode($imgBase64);
		$fileName = uniqid() . '.png';
		$filePath = SAVE_DIR . $fileName;
		$success = file_put_contents($filePath, $imgData);

		if ($success !== false) {
			return $fileName;
		} else {
			return false;
		}
	}

	function addPhotoToDb($filename, $userId) {
		$this->db->query("INSERT INTO photos (filename, user_id, creation_timestamp, user_likes, comments) VALUES (?, ?, CURRENT_TIMESTAMP, '', '')", array($filename, $userId));
	}
}