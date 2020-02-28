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

<!--		<form name="profile">-->
<!--			<div class="form-group">-->
<!--				<label>Email</label>-->
<!--				<input name="email" minlength="6" type="email" class="form-control" onblur="checkIfEmailTaken()" value="--><?//= $_SESSION['user']['email']?><!--">-->
<!--				<p>--><?//= $_SESSION['user']['email']?><!--</p>-->
<!--				<button type="button" class="btn btn-primary float-right">Change email</button>-->
<!--			</div>-->

<!--			<div class="form-group" style="width: 100%">-->
<!--				<label style="width: 100%">Username</label>-->
<!--				<input name="username" minlength="6" type="text" class="form-control" onblur="checkIfUsernameTaken()" value="--><?//= $_SESSION['user']['username']?><!--">-->
<!--				<p>--><?//= $_SESSION['user']['username']?><!--</p>-->
<!--				<button type="button" class="btn btn-primary float-right">Change username</button>-->
<!--			</div>-->

<!--			<div class="form-group">-->
<!--				<label>New password</label>-->
<!--				<input name="password" minlength="6" type="password" class="form-control" disabled>-->
<!--			</div>-->

<!--			<div class="d-flex flex-wrap justify-content-around" style="width: 100%;">-->
<!--				<button type="button" class="btn btn-primary float-right" style="margin-top: 10px">Change password</button>-->
<!--				<button type="button" class="btn btn-primary float-right" style="margin-top: 10px">Disable emails</button>-->
<!--			</div>-->

<!--			<button type="button" class="btn btn-primary float-right" style="margin-top: 12px" id="btn_save_changes">Save changes</button>-->

<!--		</form>-->

	<div class="d-flex flex-column">
		<strong>Email</strong>
		<p style="margin-bottom: 8px"><?= $_SESSION['user']['email']?></p>
		<button type="button" class="btn btn-outline-primary align-self-end" style="width: 200px; margin-bottom: 8px">Change email</button>
		<strong>Username</strong>
		<p style="margin-bottom: 8px"><?= $_SESSION['user']['username']?></p>
		<button type="button" class="btn btn-outline-primary align-self-end" style="width: 200px">Change username</button>
		<div class="border-top my-3"></div>
		<button type="button" class="btn btn-outline-primary align-self-end" style="width: 200px">Change password</button>
		<div class="border-top my-3"></div>
		<button type="button" class="btn btn-outline-primary align-self-end" style="width: 200px" id="btn_enable_emails" <?php if ($_SESSION['user']['receive_emails']): ?> hidden <?php endif;?>>Enable emails</button>
		<button type="button" class="btn btn-outline-primary align-self-end" style="width: 200px" id="btn_disable_emails" <?php if (!$_SESSION['user']['receive_emails']): ?> hidden <?php endif;?>>Disable emails</button>
	</div>
	<?php include 'parts/CardTail.php'?>


</body>
</html>