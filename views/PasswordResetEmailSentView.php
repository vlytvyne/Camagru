<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/authorization.css"/>
	<title>Email sent</title>
</head>

<body>

	<?php include 'parts/NotLoggedInNavbar.php' ?>

	<?php include 'parts/CardHead.php' ?>
	<h2 class="text-center">Reset email sent</h2>

	<p>We've sent you an email which contains a link to change the password. If you can't find our mail, make sure to check spam section.</p>

	<a href="/logIn" class="btn btn-primary float-right">Log In</a>
	<?php include 'parts/CardTail.php' ?>

</body>
</html>
