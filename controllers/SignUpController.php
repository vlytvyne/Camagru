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
		protectFromAuthorizedUser();
		include 'views/SignUpView.php';
	}

	public function confirmationAction() {
		protectFromBadRequest($_POST, 'email', 'username', 'password');
		protectFromAuthorizedUser();
		$this->model->createNewUser($_POST['username'], $_POST['email'], $_POST['password']);
		$this->model->sendConfirmationEmail($_POST['email']);
		include 'views/EmailConfirmationView.php';
	}

	public function activationAction() {
		protectFromBadRequest($_GET, 'email', 'secret');
		protectFromAuthorizedUser();
		$resultCode = $this->model->activateAccount($_GET['email'], $_GET['secret']);
		$activationResult = $this->getActivationResult($resultCode);
		include 'views/AccountActivationView.php';
	}

	//ajax
	public function emailCheckAction() {
		protectFromBadRequest($_POST, 'email');
		$isTaken = $this->model->isEmailTaken($_POST['email']);
		echo json_encode(array("isTaken" => $isTaken));
	}

	//ajax
	public function usernameCheckAction() {
		protectFromBadRequest($_POST, 'username');
		$isTaken = $this->model->isUsernameTaken($_POST['username']);
		echo json_encode(array("isTaken" => $isTaken));
	}

	private function getActivationResult($resultCode) {
		switch ($resultCode) {
			case RC_INVALID_LINK: return "This activation link is invalid. Try to copy and paste it again.";
			case RC_ALREADY_ACTIVATED: return "This account is already activated.";
			case RC_SUCCESS: return "Account is successfully activated. Please, log in.";
		}
	}
}