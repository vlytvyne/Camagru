<?php

abstract class BaseController {

	protected $params;

	public function __construct($params = []) {
		$this->params = $params;
	}

	public abstract function renderPage();

	protected function safeParamExtraction($paramNumber) {
		if (count($this->params) > $paramNumber) {
			return $this->params[$paramNumber];
		} else {
			return false;
		}
	}
}