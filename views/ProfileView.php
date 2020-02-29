<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/profile.css"/>
	<script type="text/javascript" src="/views/js/Utils.js"></script>
	<script type="text/javascript" src="/views/js/Profile.js"></script>
	<title>Profile</title>
</head>

<body>

	<?php include 'views/parts/NavBar.php'?>

	<?php include 'parts/CardHead.php' ?>
		<h2 class="text-center">Profile</h2>

		<div class="d-flex flex-column">
			<strong>Email</strong>
			<p style="margin-bottom: 8px"><?= $_SESSION['user']['email']?></p>
			<a href="/profile/changeEmail" class="btn btn-outline-primary align-self-end" style="width: 200px; margin-bottom: 8px">Change email</a>

			<strong>Username</strong>
			<p style="margin-bottom: 8px"><?= $_SESSION['user']['username']?></p>
			<a href="/profile/changeUsername" class="btn btn-outline-primary align-self-end" style="width: 200px">Change username</a>

			<div class="border-top my-3"></div>
			<a href="/profile/changePassword" class="btn btn-outline-primary align-self-end" style="width: 200px">Change password</a>

			<div class="border-top my-3"></div>
			<button type="button" class="btn btn-outline-primary align-self-end" style="width: 200px" id="btn_enable_emails" <?php if ($_SESSION['user']['receive_emails']): ?> hidden <?php endif;?>>Enable emails</button>
			<button type="button" class="btn btn-outline-primary align-self-end" style="width: 200px" id="btn_disable_emails" <?php if (!$_SESSION['user']['receive_emails']): ?> hidden <?php endif;?>>Disable emails</button>
		</div>
	<?php include 'parts/CardTail.php'?>


</body>
</html>