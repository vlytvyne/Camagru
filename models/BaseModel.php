<?php

class BaseModel {

	protected $db;

	public function __construct() {
		include_once 'DB.php';
		$this->db = new DB();
	}
}
