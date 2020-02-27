<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/photo_booth.css"/>
	<script type="text/javascript" src="/views/js/Utils.js"></script>
	<title>Photo Booth</title>
	<style>
		#webcam_container {
			padding: 2px;
			max-width: 50vw;
			min-width: 300px;
			height: 50vh;
			margin: 3vh auto auto;
			background-color: #08AEEA;
			background-image: linear-gradient(90deg, #08AEEA 0%, #2AF598 100%);;
		}
		#stickers_box {
			width: 50vw;
			min-width: 300px;
			height: 20vh;
			margin: 3vh auto auto;
		}
		#canvas {
			height: 100%;
			width: 100%;
		}
		#video {

		}
	</style>
</head>

<body>

	<?php include 'parts/NavBar.php' ?>

	<div id="webcam_container">
		<video id="video" hidden="hidden"></video>
		<canvas id="canvas"></canvas>
	</div>

	<div style="width: 100vw; margin-top: 3vh; height: 40px" class="d-flex justify-content-center">
		<label class="btn btn-light" style="margin-right: 30px; height: 40px">
			Use local file<input type="file" style="display: none;" id="file_input">
		</label>

		<button class="btn btn-primary" id="webcam_btn">Use webcam</button>
	</div>

	<div class="card" id="stickers_box">
	</div>

	<script src="/views/js/PhotoBooth.js"></script>

</body>
</html>