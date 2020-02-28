<?php

include_once 'BaseController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/models/GalleryModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Utils.php';

class GalleryController extends BaseController {

	private $model;

	public function __construct() {
		$this->model = new GalleryModel();
	}

	public function indexAction() {
		include 'views/GalleryView.php';
	}

	//ajax
	public function fetchPhotosAction() {
		protectFromBadRequest($_POST, 'page', 'iop');
		$result = $this->model->fetchPhotos($_POST['page'], $_POST['iop']);
		echo json_encode(array("photos" => $result));
	}
}