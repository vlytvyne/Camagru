<nav class="navbar">
	<a href="#" class="navbar-brand">Camagru</a>
	<ul class="nav navbar-nav flex-row">

<?php if (isset($_SESSION['user'])) : ?>
		<li class="nav-item">
			<a href="/logIn/logUserOut" class="btn btn-outline-light">Log Out</a>
		</li>
<?php else: ?>
		<li class="nav-item" style="margin-right: 16px">
			<a href="/logIn" class="btn btn-outline-light">Log In</a>
		</li>

		<li class="nav-item">
			<a href="/signUp" class="btn btn-primary">Sign Up</a>
		</li>
<?php endif; ?>
	</ul>
</nav>