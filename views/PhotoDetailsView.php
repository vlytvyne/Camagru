<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/photo_details.css"/>
	<script type="text/javascript" src="/views/js/Utils.js"></script>
	<script type="text/javascript" src="/views/js/PhotoDetails.js"></script>
	<title>Photo Details</title>
</head>

<body>

	<?php include 'parts/NavBar.php' ?>

	<div id="main_container">
		<h1><?= $owner_username ?></h1>

		<div id="photo_container">
			<img src="/photos/<?= $photo_filename ?>" id="photo">
			<?php if (isset($_SESSION['user'])): ?>
			<div class="like_container d-flex">
				<span style="color: white; font-size: 30px" id="likes_amount"><?= $likesAmount ?></span>
				<img src="/resources/like_filled.png" class="like_img" id="btn_remove_like" <?php if (!$isLikedByUser): ?> hidden <?php endif;?>>
				<img src="/resources/like_empty.png" class="like_img" id="btn_like" <?php if ($isLikedByUser): ?> hidden <?php endif;?>>
			</div>
			<?php endif; ?>
		</div>

		<?php if (isset($_SESSION['user']) && $_SESSION['user']['username'] == $owner_username): ?>
		<div class="d-flex justify-content-end">
			<button class="btn btn-danger align-self-end" id="btn_delete">Delete photo</button>
		</div>
		<?php endif; ?>

		<?php if (isset($_SESSION['user'])): ?>
			<h1>Comments</h1>

			<div class="card">
				<div class="card-body">
					<h4>New comment</h4>
					<textarea class="form-control" rows="3" id="input_comment"></textarea>
				<button class="btn btn-primary float-right" id="publish_btn">Publish the comment</button>
				</div>
			</div>

			<div class="card" style="margin-top: 20px; margin-bottom: 20px">
				<div class="card-body">
				<?php if (count($comments) == 0): ?>
					<h4>No comments yet</h4>
				<?php endif; ?>

				<?php foreach ($comments as $comment): ?>
					<h5><?= $comment['username'] ?></h5>
					<p><?= $comment['comment'] ?></p>
				<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>

	</div>

</body>
</html>

<?php
