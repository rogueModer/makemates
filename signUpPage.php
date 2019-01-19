<?php
	require_once __DIR__ . "/includes/header.php";
	require_once __DIR__ . "/init.php";

	if(LOGIN::isLoggedIn()){
      	header('Location: homeProfile.php' );
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

	<!-- User Registration Form -->

	<div class="container" id="signup_container">
		<fieldset>
			<legend>Register :</legend>
			<form method="POST" class="text-center" id="registerForm">
				<label for="Username">Full Name : </label>
				<input type="text" name="fullName" class="form-control" id="fn" > <br>
				<label for="Username">Username :</label>
				<input type="text" name="username" class="form-control" id="un"> <br>
				<label for="EmaildId">Email Id :</label>
				<input type="text" name="emailId" class="form-control" id="eId"> <br>
				<label for="password">Password :</label>
				<input type="password" name="passkey" class="form-control" id="pswd"> <br>
				<label for="cpassword">Confirm Password :</label>
				<input type="password" name="cpasskey" class="form-control" id="cpswd"> <br>
				<input type="submit" name="signUpBtn" id="signUpBtn" value="submit" class="btn btn-success btn-md mb-3">
			</form>
		</fieldset>
		<div id="result1"></div>
	</div>





	<script src="public/js/signup.js"></script>
<?php
	require __DIR__ . "/includes/footer.php";
 ?>
