<?php

include_once 'BaseController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/models/PhotoBoothModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Utils.php';

const SAVE_DIR =  'photos/';

class PhotoBoothController extends BaseController {

	private $model;

	public function __construct() {
		$this->model = new PhotoBoothModel();
	}

	public function indexAction() {
		include 'views/PhotoBoothView.php';
	}

	//ajax
	public function publishPhotoAction() {
		protectFromBadRequest($_POST, 'photoBase64');
		$result = $this->model->savePhoto($_POST['photoBase64']);
		if ($result !== false) {
			$this->model->addPhotoToDb($result, $_SESSION['user']['id']);
		}
		echo json_encode(array('isSuccess' => $result));
	}

}