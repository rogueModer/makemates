<?php
	
	require_once __DIR__ . "/includes/header.php";
	require_once __DIR__ . "/init.php";

	if(!LOGIN::isLoggedIn()){
		header('Location: index.php?please login to your account');
	}
	else {
		
		$userData = DB::query('SELECT `fn`, `un` FROM `users` WHERE user_id = :user_id', array(':user_id' => $_COOKIE['MMID_']));
		
		if(isset($_GET['u'])){
			
			$su = filter_var($_GET['u'], FILTER_SANITIZE_STRING);

			if(DB::query('SELECT fn FROM users WHERE un = :un', array(':un' => $su))){

				$su = DB::query('SELECT user_id, fn, un, email FROM users WHERE un = :un', array(':un' => $su));

			} else{
				echo "<h2> User not found</h2>";
			}
		}



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

	<div id="userSidebar" class="card">
   		<?php
   			
   			if(DB::query('SELECT profilePicName FROM profilepic WHERE user_id = :id', array(':id' => $su[0][0]))){
   				$picName = DB::query('SELECT profilePicName FROM profilepic WHERE user_id = :id', array(':id' => $su[0][0]))[0][0];
   		
   				if(isset($picName)){
   					echo "<img class='card-img-top' src='public/profilePic/{$picName}' alt='Card image' style='width:100%'>";
   				}
   		
   			} 
   			else{
   				echo "<img class='card-img-top' src='public/image/profileImg.jpg' alt='Card image' style='width:100%'>";	
   			}

   		?> 


   			<div class="card-body text-center">
   				<h6 class="card-title"><?php if(isset($su)){ echo $su[0][1];} ?></h6>
   			</div>
   		

   		<ul>
   			<li><a href="profile.php?u=<?php echo $su[0][2];?>" class="profilePages" name="timeline">&#9755; Timeline</a></li>
   			<li><a href="profile.php?u=<?php echo $su[0][2];?>&p=about" class="profilePages" name="about">&#9755; About</a></li>
   			<li><a href="profile.php?u=<?php echo $su[0][2];?>&p=photos" class="profilePages" name="photos">&#9755; Photos</a></li>
   			<li><a href="profile.php?u=<?php echo $su[0][2];?>&p=likes" class="profilePages" name="likes">&#9755; Likes</a></li>
   			<li><a href="profile.php?u=<?php echo $su[0][2];?>&p=comments" class="profilePages" name="comments">&#9755; Comments</a></li>
   		</ul>

  	</div>

		<!-- User Post -->

  	<div id="mainProfileBox">
		<?php
		  
		  if(isset($_GET['p'])){
			$pageReq = $_GET['p'] . ".php";
		  } else{
			$pageReq = "timeline.php";
		  }

		  include_once ($pageReq)


		 ?>

  	</div>

 
  	<div id="followersSideBar">
  		<div id="followerListText">Follower's List :</div>
  		<ul id="followerList" class="text-center">
  			<?php 
  					$sufd = DB::query('SELECT follower_user_id FROM add_followers WHERE user_id = :id', array(':id' => $su[0][0]));

  					forEach($sufd as $follower){
  						$fName = DB::query('SELECT `fn`, `un`, `user_id` FROM `users` WHERE `user_id` = :id', array(':id' => $follower[0]))[0];

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

   	<script src="./public/js/sendPost.js"></script>
	<script src="./public/js/loadPost.js"></script>
	<script src="./public/js/pageReq.js"></script>

<?php
}
	require __DIR__ . "/includes/footer.php";
 ?>
