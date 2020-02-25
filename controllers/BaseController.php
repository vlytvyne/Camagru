<?php

abstract class BaseController {

	public abstract function indexAction();

	protected function safeParamExtraction($paramNumber) {
		if (count($this->params) > $paramNumber) {
			return $this->params[$paramNumber];
		} else {
			return false;
		}
	}
}