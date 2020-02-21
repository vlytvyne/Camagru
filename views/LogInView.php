<!doctype html>

<html lang="en">

	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/views/css/authorization.css"/>
		<title>Log In</title>
	</head>

	<body>

	<?php include 'parts/NotLoggedInNavbar.php' ?>

	<?php include 'parts/CardHead.php' ?>
	<h2 class="text-center">Log In</h2>

	<form>

		<div class="form-group">
			<label>Nickname</label>
			<input type="text" class="form-control">
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control">
		</div>

		<button class="btn btn-primary float-right">Log In</button>

	</form>

	<a href="/resetPassword" class="btn btn-outline-primary">Forgot Password</a>
	<?php include 'parts/CardTail.php' ?>

	</body>
</html>