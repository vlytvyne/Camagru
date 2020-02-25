<?php

include_once 'BaseController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/models/SignUpModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Utils.php';

class SignUpController extends BaseController {

	private $model;

	public function __construct() {
		$this->model = new SignUpModel();
	}

	public function indexAction() {
		include 'views/SignUpView.php';
	}

	public function confirmationAction() {
		protectFromBadRequest(POST, 'email', 'username', 'password');
		$this->model->createNewUser($_POST['username'], $_POST['email'], $_POST['password']);
		$this->model->sendConfirmationEmail($_POST['email']);
		include 'views/EmailConfirmationView.php';
	}

	public function activationAction() {
		protectFromBadRequest(GET, 'email', 'secret');
		$resultCode = $this->model->activateAccount($_GET['email'], $_GET['secret']);
		$activationResult = $this->getActivationResult($resultCode);
		include 'views/AccountActivationView.php';
	}

	public function emailCheckAction() {
		protectFromBadRequest(GET, 'email');
		$exists = $this->model->isEmailTaken($_GET['email']);
		echo json_encode(array("isTaken" => $exists));
	}

	public function usernameCheckAction() {
		protectFromBadRequest(GET, 'username');
		$exists = $this->model->isUsernameTaken($_GET['username']);
		echo json_encode(array("isTaken" => $exists));
	}

	private function getActivationResult($resultCode) {
		switch ($resultCode) {
			case RC_INVALID_LINK: return "This activation link is invalid. Try to copy and paste it again.";
			case RC_ALREADY_ACTIVATED: return "This account is already activated.";
			case RC_SUCCESS: return "Account is successfully activated. Please, log in.";
		}
	}
}