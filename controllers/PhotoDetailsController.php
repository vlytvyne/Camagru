<?php

include_once 'BaseController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/models/PhotoDetailsModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Utils.php';

class PhotoDetailsController extends BaseController {

	private $model;

	public function __construct() {
		$this->model = new PhotoDetailsModel();
	}

	public function indexAction() {
		protectFromBadRequest($_GET, 'id');
		$result = $this->model->fetchPhoto($_GET['id']);
		if ($result === false) {
			http_response_code(404);
			die();
		}
		$photo_filename = $result['filename'];
		$_SESSION['current_viewed_photo_id'] = $_GET['id'];
		$_SESSION['current_viewed_photo_filename'] = $photo_filename;
		$owner_username = $result['username'];
		$likes = $this->model->getLikes($_GET['id']);
		$comments = $this->model->getComments($_GET['id']);
		$likesAmount = count($likes);
		$isLikedByUser = false;
		if (isset($_SESSION['user'])) {
			foreach ($likes as $like) {
				if ($like['user_id'] == $_SESSION['user']['id']) {
					$isLikedByUser = true;
				}
			}
		}
		include 'views/PhotoDetailsView.php';
	}

	//ajax
	public function likePhotoAction() {
		protectFromBadRequest($_SESSION, 'current_viewed_photo_id', 'user');
		$this->model->likePhoto($_SESSION['current_viewed_photo_id'], $_SESSION['user']['id']);
	}

	//ajax
	public function removeLikeFromPhotoAction() {
		protectFromBadRequest($_SESSION, 'current_viewed_photo_id', 'user');
		$this->model->removeLikeFromPhoto($_SESSION['current_viewed_photo_id'], $_SESSION['user']['id']);
	}

	//ajax
	public function commentPhotoAction() {
		protectFromBadRequest($_SESSION, 'current_viewed_photo_id', 'user');
		protectFromBadRequest($_POST, 'comment');
		$this->model->commentPhoto($_SESSION['current_viewed_photo_id'], $_SESSION['user']['id'], $_POST['comment']);
		$this->model->sendNewCommentEmail($_SESSION['current_viewed_photo_id'], $_SESSION['user']['username'], $_POST['comment']);
	}

	//ajax
	public function deletePhotoAction() {
		protectFromBadRequest($_SESSION, 'current_viewed_photo_id', 'current_viewed_photo_filename');
		$this->model->deletePhoto($_SESSION['current_viewed_photo_id'], $_SESSION['current_viewed_photo_filename']);
	}
}