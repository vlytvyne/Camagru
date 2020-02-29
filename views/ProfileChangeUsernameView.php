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
			let input = document.getElementById('input_username');
			let username = input.value;
			if (isUsernameValid(username)) {
				setUsernameIfNotTaken(username)
			}
		}

		function setUsernameIfNotTaken(username) {
			ajax("/signUp/usernameCheck", `username=${username}`, function (response) {
				if (response.isTaken) {
					alert("This username is already taken.")
				} else  {
					setUsername(username)
				}
			})
		}

		function setUsername(username) {
			ajax("/profile/setUsername", `username=${username}`, () => {})
			window.location.replace('/profile')
		}
	</script>
</head>

<body>

<?php include 'parts/NavBar.php' ?>

<?php include 'parts/CardHead.php' ?>
<h2 class="text-center">Change username</h2>

<form>
	<div class="form-group">
		<label>New username</label>
		<input id="input_username" minlength="6" type="text" class="form-control" value="<?= $_SESSION['user']['username'] ?>">
	</div>

	<button class="btn btn-primary float-right" type="button" onclick="onChangeClick()">Change</button>

</form>
<?php include 'parts/CardTail.php' ?>

</body>
</html>