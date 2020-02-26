<?php if (isset($_SESSION['user'])) : ?>
	<nav class="navbar">
		<a href="#" class="navbar-brand">Camagru</a>

		<ul class="nav navbar-nav flex-row">
			<li class="nav-item" style="margin-right: 16px">
				<a href="/logIn/logUserOut" class="btn btn-outline-light">Log Out</a>
			</li>
		</ul>

	</nav>
<?php else: ?>
	<nav class="navbar">
		<a href="#" class="navbar-brand">Camagru</a>

		<ul class="nav navbar-nav flex-row">
			<li class="nav-item" style="margin-right: 16px">
				<a href="/logIn" class="btn btn-outline-light">Log In</a>
			</li>

			<li class="nav-item">
				<a href="/signUp" class="btn btn-primary">Sign Up</a>
			</li>
		</ul>

	</nav>
<?php endif; ?>
