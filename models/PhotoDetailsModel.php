<?php

include_once 'BaseModel.php';

class PhotoDetailsModel extends BaseModel {

	function fetchPhoto($photoId) {
		$result = $this->db->query("SELECT * FROM photos INNER JOIN users ON photos.user_id = users.id WHERE photos.id = ?", array($photoId));
		if (count($result) > 0) {
			return $result[0];
		} else {
			return false;
		}
	}

	function getLikes($photoId) {
		$result = $this->db->query("SELECT user_id FROM likes WHERE photo_id = ?", array($photoId));
		return $result;
	}

	function getComments($photoId) {
		$result = $this->db->query("SELECT comments.comment, users.username FROM comments INNER JOIN users ON comments.user_id = users.id WHERE comments.photo_id = ?", array($photoId));
		return $result;
	}

	function likePhoto($photoId, $userId) {
		$this->db->query("INSERT INTO `likes` (`user_id`, `photo_id`) VALUES (?, ?)", array($userId, $photoId));
	}

	function removeLikeFromPhoto($photoId, $userId) {
		$this->db->query("DELETE FROM likes WHERE user_id = ? AND photo_id = ?", array($userId, $photoId));
	}

	function commentPhoto($photoId, $userId, $comment) {
		$this->db->query("INSERT INTO `comments` (`user_id`, `photo_id`, `comment`) VALUES (?, ?, ?)", array($userId, $photoId, $comment));
	}

	function sendNewCommentEmail($photoId, $commentatorUsername, $comment) {
		$result = $this->db->query("SELECT receive_emails, email FROM photos INNER JOIN users ON photos.user_id = users.id WHERE photos.id = ?", array($photoId));

		if (count($result) < 1) {
			return;
		}

		$wantToReceiveEmail = $result[0]['receive_emails'];
		$email = $result[0]['email'];

		if (!$wantToReceiveEmail) {
			return;
		}


		$to      = $email;
		$subject = 'New comment';
		$message = "You just got a new comment on your photo in Camagru from $commentatorUsername!\n\n'$comment'";
		$headers = 'From: camagru@camagru.com' . "\r\n" .
			'Reply-To: camagru@camagru.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);
	}

	function deletePhoto($photoId, $photoFilename) {
		$this->db->query("DELETE FROM photos WHERE id = ?", array($photoId));
		$this->db->query("DELETE FROM likes WHERE photo_id = ?", array($photoId));
		$this->db->query("DELETE FROM comments WHERE photo_id = ?", array($photoId));
		unlink("photos/$photoFilename");
	}
}