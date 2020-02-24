<?php

include_once 'BaseController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/models/SignUpModel.php';

class SignUpController extends BaseController {

	private $model;

	public function __construct($params = []) {
		parent::__construct($params);
		$this->model = new SignUpModel();
	}

	public function renderPage() {
		if ($this->isConfirmation()) {
			$this->model->createNewUser($_POST['username'], $_POST['email'], $_POST['password']);
			$this->model->sendConfirmationEmail($_POST['email']);
			include 'views/EmailConfirmationView.php';
		} else if ($this->isActivation()) {
			$resultCode = $this->model->activateAccount($_GET['email'], $_GET['secret']);
			$activationResult = $this->getActivationResult($resultCode);
			include 'views/AccountActivationView.php';
		} else if ($this->isSignUp()) {
			include 'views/SignUpView.php';
		} else if ($this->isEmailCheck()) {
			$exists = $this->model->emailTaken($_GET['email']);
			echo json_encode(array("isTaken" => $exists));
		} else if ($this->isUsernameCheck()){
			$exists = $this->model->usernameTaken($_GET['username']);
			echo json_encode(array("isTaken" => $exists));
		} else {
			header("Location: http://localhost/signUp");
		}
	}

	private function isEmailCheck() {
		return $this->safeParamExtraction(0) === "emailCheck" &&
			isset($_GET['email']);
	}

	private function isUsernameCheck() {
		return $this->safeParamExtraction(0) === "usernameCheck" &&
			isset($_GET['username']);
	}

	private function isConfirmation() {
		return $this->safeParamExtraction(0) === "confirmation" &&
			$_SERVER['REQUEST_METHOD'] == 'POST';
	}

	private function isActivation() {
		return $this->safeParamExtraction(0) === "activation" &&
			isset($_GET['email']) &&
			isset($_GET['secret']);
	}

	private function isSignUp() {
		return count($this->params) == 0;
	}

	private function getActivationResult($resultCode) {
		switch ($resultCode) {
			case RC_INVALID_LINK: return "This activation link is invalid. Try to copy and paste it again.";
			case RC_ALREADY_ACTIVATED: return "This account is already activated.";
			case RC_SUCCESS: return "Account is successfully activated. Please, log in.";
		}
	}
}