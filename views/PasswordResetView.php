<!doctype html>

<html lang="en">

	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/views/css/authorization.css"/>
		<script type="text/javascript" src="/views/js/Utils.js"></script>
		<script type="text/javascript" src="/views/js/ResetPasswordValidation.js"></script>
		<title>Reset password</title>
	</head>

	<body>

	<?php include 'parts/NotLoggedInNavbar.php' ?>

	<?php include 'parts/CardHead.php' ?>
	<h2 class="text-center">Password Reset</h2>

	<form name="resetPassword" method="post" onsubmit="return validateForm()" action="/resetPassword/emailSent">
		<div class="form-group">
			<label>Email</label>
			<input name="email" type="email" class="form-control" minlength="6">
		</div>

		<button type="submit" class="btn btn-primary float-right">Reset</button>
	</form>
	<?php include 'parts/CardTail.php' ?>

	</body>
</html>
