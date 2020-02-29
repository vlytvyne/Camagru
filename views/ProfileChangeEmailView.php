<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/views/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/profile.css"/>
	<title>Change email</title>
	<script type="text/javascript" src="/views/js/Utils.js"></script>
	<script>
		function onChangeClick() {
			let input = document.getElementById('input_email');
			let email = input.value;
			if (isEmailValid(email)) {
				setEmailIfNotTaken(email)
			}
		}

		function setEmailIfNotTaken(email) {
			ajax("/signUp/emailCheck", `email=${email}`, function (response) {
				if (response.isTaken) {
					alert("This email is already taken.")
				} else {
					setEmail(email)
				}
			})
		}

		function setEmail(email) {
			ajax("/profile/setEmail", `email=${email}`, () => {})
			window.location.replace('/profile')
		}
	</script>
</head>

<body>

	<?php include 'parts/NavBar.php' ?>

	<?php include 'parts/CardHead.php' ?>
	<h2 class="text-center">Change email</h2>

	<form>
		<div class="form-group">
			<label>New email</label>
			<input id="input_email" minlength="6" type="email" class="form-control" value="<?= $_SESSION['user']['email'] ?>">
		</div>

		<button class="btn btn-primary float-right" type="button" onclick="onChangeClick()">Change</button>

	</form>
	<?php include 'parts/CardTail.php' ?>

</body>
</html>