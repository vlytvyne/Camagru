<?php

include_once 'BaseController.php';

class PasswordResetController extends BaseController {

	public function renderPage() {
		include 'views/PasswordResetView.php';
	}
}