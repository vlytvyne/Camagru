<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/authorization.css"/>
	<title>Email confirmation</title>
</head>

<body>

	<?php include 'parts/NotLoggedInNavbar.php' ?>

	<?php include 'parts/CardHead.php' ?>
	<h2 class="text-center">Email confirmation</h2>

	<p>We've sent you an email to confirm your mail address. Please, follow instructions in email and then log in. If you can't find our mail, make sure to check spam section.</p>

	<a href="/logIn" class="btn btn-primary float-right">Log In</a>
	<?php include 'parts/CardTail.php' ?>

</body>
</html>