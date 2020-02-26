<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/authorization.css"/>
	<title>Account Activation</title>
</head>

<body>

	<?php include 'parts/NavBar.php' ?>

	<?php include 'parts/CardHead.php' ?>
	<h2 class="text-center">Account activation</h2>

	<p><?= $activationResult ?></p>

	<a href="/logIn" class="btn btn-primary float-right">Log In</a>
	<?php include 'parts/CardTail.php' ?>

</body>
</html>