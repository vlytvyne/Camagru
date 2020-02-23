<?php

class DB {

	private $db;

	public function __construct() {
		include_once "config/database.php";
		$this->db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	}

	public function query($sql, $params = []) {
		$statement = $this->db->prepare($sql);
		$statement->execute($params);
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;

	}

}