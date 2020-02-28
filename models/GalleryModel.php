<?php

include_once 'BaseModel.php';

class GalleryModel extends BaseModel {

	public function fetchPhotos($page, $iop) {
		$offset = ($page - 1) * $iop;
		return $this->db->query("SELECT * FROM photos ORDER BY creation_timestamp LIMIT ?, ?", array($offset, $iop));
	}

}