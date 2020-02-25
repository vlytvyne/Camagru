<?php

include_once 'BaseController.php';

class PasswordResetController extends BaseController {

	public function indexAction() {
		include 'views/PasswordResetView.php';
	}
}