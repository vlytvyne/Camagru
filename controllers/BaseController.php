<?php

abstract class BaseController {

	protected $action;

	public function __construct($action = null) {
		$this->action = $action;
	}

	public abstract function renderPage();

}