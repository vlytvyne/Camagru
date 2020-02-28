<?php

include_once 'BaseModel.php';

class GalleryModel extends BaseModel {

	public function fetchPhotos($page, $iop, $username = null) {
		$offset = ($page - 1) * $iop;
		if ($username == null) {
			return $this->db->query("SELECT * FROM photos ORDER BY creation_timestamp DESC LIMIT ?, ?", array($offset, $iop));
		} else {
			return $this->db->query("SELECT * FROM photos WHERE username = ? ORDER BY creation_timestamp DESC LIMIT ?, ?", array($username, $offset, $iop));
		}
	}

}