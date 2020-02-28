<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/gallery.css"/>
	<script type="text/javascript" src="/views/js/Utils.js"></script>
	<script type="text/javascript" src="/views/js/Gallery.js"></script>
	<title>Gallery</title>
	<style>
		h1 {
			font-size: 100px;
			margin-bottom: 0px;
			color: white;
		}
	</style>
</head>

<body>

	<?php include 'parts/NavBar.php' ?>

	<div style="text-align: center; width: 100%;">
		<h1>Gallery</h1>
	</div>

	<div class="container">
		<div class="row justify-content-around" id="photos_container">
<!--			<div class="col-lg-3 col-md-5 card my_col ">-->
<!--				<img src="/photos/photo_1.jpeg">-->
<!--			</div>-->

		</div>
	</div>

	<div style="width: 100%; text-align: center">
		<button class="btn btn-success" style="margin-bottom: 3vh;" id="btn_load_more">Load more</button>
	</div>

</body>
</html>
