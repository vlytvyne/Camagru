<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/profile.css"/>
	<title>Change username</title>
	<script type="text/javascript" src="/views/js/Utils.js"></script>
	<script>
		function onChangeClick() {
			let input = document.getElementById('input_password');
			let password = input.value;
			if (isPasswordValid(password)) {
				setPassword(password)
			}
		}

		function setPassword(password) {
			ajax("/profile/setPassword", `password=${password}`, () => {});
			window.location.replace('/profile')
		}
	</script>
</head>

<body>

<?php include 'parts/NavBar.php' ?>

<?php include 'parts/CardHead.php' ?>
<h2 class="text-center">Change password</h2>

<form>
	<div class="form-group">
		<label>New password</label>
		<input id="input_password" minlength="6" type="password" class="form-control">
	</div>

	<button class="btn btn-primary float-right" type="button" onclick="onChangeClick()">Change</button>

</form>
<?php include 'parts/CardTail.php' ?>

</body>
</html>