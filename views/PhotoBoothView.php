<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/photo_booth.css"/>
	<script type="text/javascript" src="/views/js/Utils.js"></script>
	<script src="/views/js/PhotoBooth.js"></script>
	<title>Photo Booth</title>
</head>

<body>

	<?php include 'parts/NavBar.php' ?>

	<div id="webcam_container">
		<video id="video" hidden="hidden"></video>
		<canvas id="canvas"></canvas>
	</div>

	<div class="d-flex justify-content-center" id="photo_btns_container">
		<label class="btn btn-light" style="margin-right: 30px; height: 40px">
			Use local file<input type="file" style="display: none;" id="file_input">
		</label>

		<button class="btn btn-primary" id="webcam_btn">Use webcam</button>
	</div>

	<div class="card flex-row" id="stickers_box">

		<img class="sticker" src="/resources/crying_cat.png" id="crying_cat">
		<img class="sticker" src="/resources/watermelon_dog.png" >
		<img class="sticker" src="/resources/fuck_cat.png" >
		<img class="sticker" src="/resources/gusse.png" >
		<img class="sticker" src="/resources/knuckles.png" >
		<img class="sticker" src="/resources/harold.png" >
		<img class="sticker" src="/resources/monster.png" >
		<img class="sticker" src="/resources/pornhub.png" >

	</div>

	<div id="publish_btn_container">
		<button class="btn btn-success disabled" id="publish_btn" disabled>Publish the photo</button>
	</div>

</body>
</html>
