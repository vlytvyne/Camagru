<?php

include_once 'BaseController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/models/PhotoBoothModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Utils.php';

const SAVE_DIR =  'photos/';

class PhotoBoothController extends BaseController {

	public function indexAction() {
		include 'views/PhotoBoothView.php';
	}

	//ajax
	public function savePhotoAction() {
		protectFromBadRequest($_POST, 'photoBase64');
		$img = $_POST['photoBase64'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$imgData = base64_decode($img);
		$file = SAVE_DIR . uniqid() . '.png';
		$success = file_put_contents($file, $imgData);
		echo json_encode(array('isSuccess' => $success));
	}
}