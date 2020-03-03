<?php

class DB {

	private $db;

	public function __construct() {
		include_once "config/database.php";
		$this->db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function query($sql, $params = []) {
		$statement = $this->db->prepare($sql);
		if ($statement === false) {
			exit("Query error");
		}
		$statement->execute($params);
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

}