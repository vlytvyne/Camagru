<?php

include_once 'BaseController.php';

class LogInController extends BaseController {

	public function renderPage() {
		include 'views/LogInView.php';
	}
}