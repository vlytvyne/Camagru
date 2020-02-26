<!doctype html>

<html lang="en">

	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/views/css/authorization.css"/>
		<script type="text/javascript" src="/views/js/Utils.js"></script>
		<script type="text/javascript" src="/views/js/LogIn.js"></script>
		<title>Log In</title>
	</head>

	<body>

	<?php include 'parts/NavBar.php' ?>

	<?php include 'parts/CardHead.php' ?>
	<h2 class="text-center">Log In</h2>

	<form name="logIn">

		<div class="form-group">
			<label>Username</label>
			<input name="username" type="text" class="form-control" minlength="6">
		</div>

		<div class="form-group">
			<label>Password</label>
			<input name="password" type="password" class="form-control" minlength="6">
		</div>

		<button type="button" class="btn btn-primary float-right" onclick="onLogInClick()">Log In</button>

	</form>

	<a href="/resetPassword" class="btn btn-outline-primary">Forgot Password</a>
	<?php include 'parts/CardTail.php' ?>

	</body>
</html>