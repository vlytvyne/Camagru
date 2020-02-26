<?php

include_once 'BaseController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/models/LogInModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Utils.php';

class LogInController extends BaseController {

	private $model;

	public function __construct() {
		$this->model = new LogInModel();
	}

	public function indexAction() {
		include 'views/LogInView.php';
	}

	//ajax
	public function logUserInAction() {
		protectFromBadRequest($_POST, 'username', 'password');
		$user = $this->model->getUser($_POST['username'], $_POST['password']);
		if ($user !== false) {
			$_SESSION['user'] = $user;
		}
		echo json_encode(array("isSuccess" => $user !== false));
	}

	public function logUserOutAction() {
		protectFromBadRequest($_SESSION, 'user');
		$_SESSION = [];
		session_destroy();
		redirect('/logIn');
	}
}