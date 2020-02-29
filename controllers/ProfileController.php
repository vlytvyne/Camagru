<?php

include_once 'BaseController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/models/ProfileModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Utils.php';

class ProfileController extends BaseController {

	private $model;

	public function __construct() {
		$this->model = new ProfileModel();
	}

	public function indexAction() {
		include 'views/ProfileView.php';
	}

	//ajax
	public function changeEmailAction() {
		protectFromBadRequest($_POST, 'email');
		$this->model->changeEmail($_SESSION['user']['email'], $_POST['email']);
	}

	//ajax
	public function changeUsernameAction() {
		protectFromBadRequest($_POST, 'username');
		$this->model->changeUsername($_SESSION['user']['username'], $_POST['username']);
	}

	//ajax
	public function changePasswordAction() {
		protectFromBadRequest($_POST, 'password');
		$this->model->changePassword($_SESSION['user']['username'], $_POST['password']);
	}

	//ajax
	public function changeReceiveEmailsAction() {
		protectFromBadRequest($_POST, 'wantReceive');
		$wantReceiveBool = $_POST['wantReceive'] == 'true' ? true : false;
		$_SESSION['user']['receive_emails'] = $wantReceiveBool;
		$this->model->changeReceiveEmails($_SESSION['user']['username'], $wantReceiveBool);
	}
}