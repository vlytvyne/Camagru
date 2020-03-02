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
		protectFromUnauthorizedUser();
		include 'views/ProfileView.php';
	}

	public function changeEmailAction() {
		protectFromUnauthorizedUser();
		include 'views/ProfileChangeEmailView.php';
	}

	public function changeUsernameAction() {
		protectFromUnauthorizedUser();
		include 'views/ProfileChangeUsernameView.php';
	}

	public function changePasswordAction() {
		protectFromUnauthorizedUser();
		include 'views/ProfileChangePasswordView.php';
	}

	//ajax
	public function setEmailAction() {
		protectFromBadRequest($_POST,'email');
		protectFromUnauthorizedUser();
		$_SESSION['user']['email'] = $_POST['email'];
		$this->model->changeEmail($_SESSION['user']['id'], $_POST['email']);
	}

	//ajax
	public function setUsernameAction() {
		protectFromBadRequest($_POST, 'username');
		protectFromUnauthorizedUser();
		$_SESSION['user']['username'] = $_POST['username'];
		$this->model->changeUsername($_SESSION['user']['id'], $_POST['username']);
	}

	//ajax
	public function setPasswordAction() {
		protectFromBadRequest($_POST, 'password');
		protectFromUnauthorizedUser();
		$this->model->changePassword($_SESSION['user']['id'], $_POST['password']);
	}

	//ajax
	public function setReceiveEmailsAction() {
		protectFromBadRequest($_POST, 'wantReceive');
		protectFromUnauthorizedUser();
		$wantReceiveBool = $_POST['wantReceive'] == 'true' ? true : false;
		$_SESSION['user']['receive_emails'] = $wantReceiveBool;
		$this->model->changeReceiveEmails($_SESSION['user']['id'], $wantReceiveBool);
	}
}