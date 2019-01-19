<?php
	require_once __DIR__ . "/includes/header.php";
	require_once __DIR__ . "/init.php";


	if(LOGIN::isLoggedIn()){
      	header('Location: index.php' );
	}
?>

<nav class="navbar navbar-expand-md position-fixed" id="myHeader">

	<!-- Brand Name -->
	<a href="index.php" class="navbar-brand" id="brand">MakeMates</a>

	<!-- Navabar toggler button -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>

	<!-- Navbar-links -->
	<div id="collapsibleNavbar" class="collapse navbar-collapse text-center">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a href="index.php" class="nav-link btn btn-danger btn-sm">Home</a>
			</li>
			<li class="nav-item">
				<a href="loginPage.php" class="nav-link btn btn-primary btn-sm ml-2">Login</a>
			</li>
			<li class="nav-item">
				<a href="signUpPage.php" class="nav-link btn btn-success btn-sm ml-2">Sign Up</a>
			</li>
		</ul>
	</div>

</nav>

	<div class="container" id="login_container">
		<fieldset>
			<legend>Login :</legend>
			<form method="POST" class="text-center" id="loginForm" >
				<label for="Username">Username : </label>
				<input type="text" name="username" class="form-control" id="username"> <br>
				<label for="Password">Password</label>
				<input type="password" name="passkey" class="form-control" id="passkey"> <br>
				<input type="submit" name="loginBtn" value="Login" class="btn btn-success btn-md mb-3">
			</form>
		</fieldset>

		<div id="result" ></div>
	</div>

	<script src="public/js/login.js"></script>
<?php
	require __DIR__ . "/includes/footer.php";
 ?>
