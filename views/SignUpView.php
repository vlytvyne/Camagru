<!doctype html>

<html lang="en">

	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/views/css/authorization.css"/>
		<title>Sign Up</title>
		<script type="text/javascript" src="/views/js/Utils.js"></script>
		<script type="text/javascript" src="/views/js/SignUpValidation.js"></script>
	</head>

	<body>

	<?php include 'parts/NotLoggedInNavbar.php' ?>

	<?php include 'parts/CardHead.php' ?>
		<h2 class="text-center">Sign Up</h2>

		<form name="signUp" method="post" onsubmit="return validateForm()" action="/logIn">
			<div class="form-group">
				<label>Email</label>
				<input name="email" type="email" class="form-control">
			</div>

			<div class="form-group">
				<label>Username</label>
				<input name="username" type="text" class="form-control">
			</div>

			<div class="form-group">
				<label>Password</label>
				<input name="password" type="password" class="form-control">
			</div>

			<button type="submit" class="btn btn-primary float-right">Sign Up</button>

		</form>
	<?php include 'parts/CardTail.php' ?>

	</body>
</html>
