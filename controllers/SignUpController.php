<?php

include_once 'BaseController.php';

class SignUpController extends BaseController {

	public function renderPage() {
		include 'views/SignUpView.php';
	}
}