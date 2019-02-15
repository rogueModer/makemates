<?php

	require_once __DIR__ . "/includes/header.php";
	require_once __DIR__ . "/init.php";

	if(!LOGIN::isLoggedIn()){

?>

	<header id="indexHeader">
	
			<div id="logo" class="col-lg-6 col-md-6 col-sm-6 text-center">
				<a href="index.php" class="nav-brand">
					<img src="public/image/mmLogo.png" width="200px">
				</a>
			</div>
			<div id="loginContainer" class="col-lg-6 col-md-6 col-sm-6 text-center">
					<form method="POST" action="config/auth.php" class="text-center" id="loginForm" >
						<input type="text" name="username" id="username" placeholder="Username"> 
						<input type="password" name="passkey" id="passkey" placeholder="Password">
						<input type="submit" name="loginBtn" value="Login" class="btn btn-success btn-md">
					</form>
					<div id="result" class="text-center text-white ml-5"></div>
			</div>
		</header>
		
		<div class="mainContainer row" >
			
			<div class="col-lg-6 col-md-6 col-sm-6 text-center" style="background-color: rgba(106, 27, 154,0.1)">
				<div class="lead" style="font-size: 40px; font-weight: 400">Welcome To MakeMates</div>
				<div style="font-size: 20px;"> Online directory where you can make a profile to make and share post. </div>
				<div id="community"></div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6">
					<div style="font-size: 30px;" class="text-center">Create New Account</div>
					<div class="container" id="signup_container">
							<form method="POST" class="text-center" id="registerForm">
								<input type="text" name="fullName" id="fn" placeholder="Full Name" > <br>
								<input type="text" name="username" id="un" placeholder="Username"> <br>
								<input type="text" name="emailId" id="eId" placeholder="Email ID"> <br>
								<input type="password" name="passkey" id="pswd" placeholder="Password"> <br>
								<input type="password" name="cpasskey" id="cpswd" placeholder="Confirm Password"> <br>
								<input type="submit" name="signUpBtn" id="signUpBtn" value="Submit" class="btn btn-success btn-md">
							</form>
						<div id="result1"></div>
					</div>
			</div>
		</div>

		<footer class="text-center page-footer text-white" >
			© 2018 MAKEMATES CORP. LTD. ALL RIGHTS RESERVED | MADE BY <a href="#" class="text-warning">ARUSH SHARMA</a>			
		</footer>

















<?php
	}
	else {
		$userData = DB::query('SELECT `fn`, `un` FROM `users` WHERE user_id = :user_id', array(':user_id' => $_COOKIE['MMID_']));

?>
	<nav class="navbar navbar-expand-md position-fixed" id="myHeader">

	<!-- Brand Name -->
		<div id="logo2">
				<a href="index.php" class="nav-brand">
					<img src="public/image/mmLogo2.png" width="110px">
				</a>
			</div>

		<form class="form-inline" action="searchProfile.php" method="GET" >
	    	<input class="form-control mr-sm-2 ml-5" name="searchUser" autocomplete="off" type="text" placeholder="Search followers. . . . ." id="searchfollower">
	    	<button class="btn btn-success btn-sm" type="submit" name="searchBtn">Search</button>
		</form>
	<!-- Navabar toggler button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

	<!-- Navbar-links -->
		<div id="collapsibleNavbar" class="collapse navbar-collapse text-center">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="index.php" class="nav-link home-btn"><i class="fas fa-home"></i></a>
				</li>
				<li class="nav-item">
					<a href="profile.php?u=<?php  echo $userData[0][1]; ?>" class="nav-link"><i class="fas fa-user"></i></a>
				</li>
				<li class="nav-item">
					<a href="message.php" class="nav-link"><i class="fas fa-envelope"></i></a>
				</li>
				<li class="nav-item">
					<a href="notification.php" class="nav-link"><i class="fas fa-bell"></i></a>
				</li>
				<li class="nav-item">
					<a href="signOut.php" class="nav-link" data-toggle="modal" data-target="#signOutModal"><i class="fas fa-sign-out-alt"></i></a>
				</li>
			</ul>
		</div>
	</nav>

	<div id="userSidebar" class="card" >

   		<?php

   			if(DB::query('SELECT profilePicName FROM profilepic WHERE user_id = :id', array(':id' => $_COOKIE['MMID_']))){
   				$picName = DB::query('SELECT profilePicName FROM profilepic WHERE user_id = :id', array(':id' => $_COOKIE['MMID_']))[0][0];
   				if(isset($picName)){
   					echo "<img class='card-img-top' src='public/profilePic/{$picName}' alt='Card image' style='width:100%'>";
   				}
   			}
   			else{
   				echo "<a href='#' data-target='#userPhotoModal' data-toggle='modal'><img class='card-img-top' src='public/image/profileImg.jpg' alt='Card image' style='width:100%'></a>";
   			}
   		?>

   			<div class="card-body text-center">
   				<h6 class="card-title"><?php if(isset($userData)){ echo $userData[0][0];} ?></h6>
   			</div>
  	</div>

		<!-- User Post -->

  		<form action="config/auth.php" method="POST" enctype="multipart/form-data" id="postForm">
			<div class="card" id="userPostBox">
				<div class="card-header lead" style="padding: 5px;">Make a post here :</div>

				<div class="card-body">
					<textarea name="textPost" cols="68" rows="4" placeholder="Write Text Here..........." id="textPostBox"></textarea>
				</div>

				<div class="card-footer" style="padding: 5px;">
					Add Photo Here :
					<input type="file" name="photoPost" >
					<input type="submit" name="postBtn" class="btn btn-success btn-md float-right" value="Share">
					<p id="postResult" class="text-center mt-2"></p>
				</div>
			</div>

   		</form>


  	<div class="container text-center" id="userLoadPost">
	
  	</div>


  	<div id="followersSideBar">
  		<div id="followerListText">Follower's</div>
  		<ul id="followerList" class="text-center">
  			<?php
  					$fList = DB::query('SELECT follower_user_id FROM add_followers WHERE user_id = :id', array(':id' => $_COOKIE['MMID_']));

  					forEach($fList as $follower){
  						$fName = DB::query('SELECT `fn`, `un` FROM `users` WHERE `user_id` = :id', array(':id' => $follower[0]))[0];

  						echo "<li class='userfollowerList'>&#9787;<a class='searchfollowerLink' href='profile.php?u={$fName[1]}'>" . $fName[0] . "</a></li>";
  					}
  			 ?>

  		</ul>
  	</div>

  <!-- The Modal -->
  <div class="modal fade" id="signOutModal">
    <div class="modal-dialog">
      <div class="modal-content">
				<form action="signOut.php" method="post">
		        <!-- Modal body -->
		        <div class="modal-body">
					<div>
						<input type="checkbox" name="allDevices" value="allDevices"> | Do you want to Sign Out From all devices ?
					</div>
		        </div>
		        <!-- Modal footer -->
		        <div class="modal-footer">
		          <input type="submit" class="btn btn-danger btn-md" name="Submit" value="Sure">
		        </div>
			</form>
			</div>
    </div>
  </div>

  <div class="modal fade" id="userPhotoModal">
  		<div class="modal-dialog">
  			<div class="modal-content">
  					<div class="modal-body text-center">
  						Choose your profile picture.
  						<hr />
  						<input type="file" name="upload_image" id="upload_image" />
  						<button type="button" id="uploadBtn" class="btn btn-success btn-md">Upload</button>
  					</div>
  			</div>
			<div id="uploaded_image"></div>
  		</div>
  </div>

<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content text-center">
      		<div class="modal-header text-center">Crop your profile picture and upload it.
        		<button type="button" class="close float-right" data-dismiss="modal">&times;</button>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo"></div>
  					</div>
  				</div>
      		</div>
      		<div class="modal-footer text-center">
				<button class="btn btn-success crop_image" name="uploadProfilePicBtn">Upload Profile Image</button>
      		</div>
    	</div>
    </div>
</div>

	

<?php
}
	require __DIR__ . "/includes/footer.php";
 ?>
