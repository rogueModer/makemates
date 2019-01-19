<?php

	require_once __DIR__ . "/includes/header.php";
	require_once __DIR__ . "/init.php";

	if(!LOGIN::isLoggedIn()){

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

	<div class="container" style="margin-top: 100px;">
		<div class="text-center">
			<h1>Welcome To MakeMates</h1>
			<h4>Online directory Where you can create an account and login and do more.</h4>
			<h5>Join Us Today Now...<a href="signUpPage.php">Join</a></h5>

		</div>
	</div>
	<div id="footer">© 2018 BAKERY IN. ALL RIGHTS RESERVED | MADE BY <a href="#">ARUSH SHARMA</a></div>

<?php
	}
	else {
		$userData = DB::query('SELECT `fn`, `un` FROM `users` WHERE user_id = :user_id', array(':user_id' => $_COOKIE['MMID_']));

?>
	<nav class="navbar navbar-expand-md position-fixed" id="myHeader">

	<!-- Brand Name -->
		<a href="index.php" class="navbar-brand" id="brand">MakeMates</a>
		<form class="form-inline" action="searchProfile.php" method="GET" >
	    	<input class="form-control mr-sm-2 ml-5" name="searchUser" autocomplete="off" type="text" placeholder="Search followers. . . . ." id="searchfollower">
	    	<button class="btn btn-success btn-md" type="submit">Search</button>
		</form>
	<!-- Navabar toggler button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

	<!-- Navbar-links -->
		<div id="collapsibleNavbar" class="collapse navbar-collapse text-center">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="index.php" class="nav-link btn btn-info btn-sm">Home</a>
				</li>
				<li class="nav-item">
					<a href="profile.php?u=<?php  echo $userData[0][1]; ?>" class="nav-link btn btn-danger btn-sm ml-2">My Profile</a>
				</li>
				<li class="nav-item">
					<a href="message.php" class="nav-link btn btn-primary btn-sm ml-2">Message</a>
				</li>
				<li class="nav-item">
					<a href="notification.php" class="nav-link btn btn-warning btn-sm ml-2">Notification</a>
				</li>
				<li class="nav-item">
					<a href="signOut.php" class="nav-link btn btn-success btn-sm ml-2" data-toggle="modal" data-target="#signOutModal">Sign Out</a>
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

  		<form action="config/auth.php" method="GET">
			<div class="card" id="userPostBox">
					<!-- Nav tabs -->
				<ul class="nav nav-tabs">
				    <li class="nav-item">
					    <a class="nav-link active" data-toggle="tab" href="#textPostBox">Text</a>
				  	</li>
				  	<li class="nav-item">
					    <a class="nav-link" data-toggle="tab" href="#photoVideoPost">Photo / Videos</a>
				 	</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane container active" id="textPostBox">
						<textarea style="background-color: white;" class="form-control" name="textPost" rows="3" id="textPost" placeholder="Type your post here........"></textarea>
						<input type="submit" class="btn btn-primary btn-md mt-2 float-right" id="postBtn" name="postBtn" value="Post">
					</div>
					<div class="tab-pane container fade" id="photoVideoPost">
						Coming Soon
					</div>
				</div>
	   		</div>
   		</form>
  	

  	<div class="container text-center" id="userLoadPost">
		<?php
			$upd = DB::query('SELECT users.user_id, users.fn, users.un, textpost.textpost, textpost.date FROM users join textpost ON users.user_id = textpost.user_id order by date desc');

			 forEach($upd as $pd){
			 		$profilepic = DB::query('SELECT profilePicName FROM profilepic where user_id = :id', array(':id' => $pd[0]));

			 		if(isset($profilepic[0][0])){
			 			echo "<div class='card lpc mb-5'>
							  <div class='card-body'>
							    <h6 class='card-title text-left'><img class='post-profile-img' src='public/profilePic/{$profilepic[0][0]}'> <a href='profile.php?u={$pd[2]}'>{$pd[1]}</a></h6><hr>
							    <p class='card-text'>{$pd[3]}</p> <hr>
							    <p class='card-link text-left '>Post on : {$pd[4]}</p>
							  </div>
						  </div>";
			 		} else{
			 			
				 		echo "<div class='card lpc mb-5'>
								  <div class='card-body'>
								    <h6 class='card-title text-left'><img class='img-circle' src='public/image/profileImg.jpg' width='30px' height='auto'> <a href='profile.php?u={$pd[2]}'>{$pd[1]}</a></h6><hr>
								    <p class='card-text'>{$pd[3]}</p> <hr>
								    <p class='card-link text-left'>Post on : {$pd[4]}</p>
								  </div>
							  </div>";
				 		}
				 }

		 ?>
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

   	<script src="./public/js/sendPost.js"></script>
	<script src="./public/js/loadPost.js"></script>

<?php
}
	require __DIR__ . "/includes/footer.php";
 ?>
