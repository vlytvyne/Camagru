<?php

include_once 'BaseController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/models/PasswordResetModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Utils.php';

class PasswordResetController extends BaseController {

	private $model;

	public function __construct() {
		$this->model = new PasswordResetModel();
	}

	public function indexAction() {
		protectFromAuthorizedUser();
		include 'views/PasswordResetView.php';
	}

	public function emailSentAction() {
		protectFromBadRequest($_POST, 'email');
		protectFromAuthorizedUser();
		$this->model->sendPasswordResetEmail($_POST['email']);
		include 'views/PasswordResetEmailSentView.php';
	}

	public function enterNewPasswordAction() {
		protectFromBadRequest($_GET, 'email', 'secret');
		protectFromAuthorizedUser();
		if (!$this->model->isSecretValid($_GET['email'], $_GET['secret'])) {
			http_response_code(400);
			die();
		}
		$_SESSION['resetPasswordEmail'] = $_GET['email'];
		$_SESSION['resetPasswordSecret'] = $_GET['secret'];
		include 'views/PasswordResetNewPassword.php';
	}

	public function setNewPasswordAction() {
		protectFromBadRequest($_SESSION, 'resetPasswordEmail', 'resetPasswordSecret');
		protectFromBadRequest($_POST['password']);
		protectFromAuthorizedUser();
		if (!$this->model->isSecretValid($_SESSION['resetPasswordEmail'], $_SESSION['resetPasswordSecret'])) {
			http_response_code(400);
			die();
		}
		$this->model->setNewPassword($_SESSION['resetPasswordEmail'], $_POST['password']);
		$_SESSION = [];
		redirect('/logIn');
	}
}