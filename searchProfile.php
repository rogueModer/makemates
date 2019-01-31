<?php

	require_once __DIR__ . "/includes/header.php";
	require_once __DIR__ . "/init.php";

	if(!LOGIN::isLoggedIn()){
      	header('Location: index.php?please login to you account' );
	}	else{
				$userData = DB::query('SELECT `fn`, `un` FROM `users` WHERE user_id = :user_id', array(':user_id' => $_COOKIE['MMID_']));

		
		if(isset($_GET['searchUser'])){
			
				$searchUser = trim(filter_var($_GET['searchUser'], FILTER_SANITIZE_STRING));
				$searchData = DB::query('SELECT `fn`, `un`, `user_id` FROM `users` WHERE `fn` = :fn', array(':fn' => $searchUser));

		 }


?>

<nav class="navbar navbar-expand-md position-fixed" id="myHeader">

	<!-- Brand Name -->
	<a href="index.php" class="navbar-brand" id="brand">MakeMates</a>
	<form class="form-inline" action="searchProfile.php" method="GET" >
    <input class="form-control mr-sm-2 ml-5" value="<?php if(isset($searchUser)){ echo $searchUser;}?>" name="searchUser" type="text" placeholder="Search followers. . . . .">
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

	<!-- follower's List -->

	<div class="container list-group" style="margin-top: 100px;">
		<?php

		if($_GET['searchUser'] == ""){
			echo "<p class='lead'>You have not search for anybody........</p>";
		} else{
			echo "<p class='lead'>Searched For : " . $_GET['searchUser'] ."</p>";
		}


		if(isset($searchData)){

			forEach($searchData as $data){
				if(LOGIN::checkfollower($data, $_COOKIE['MMID_']) == "no" ){
					echo "<div class='list-group-item mb-3'> {$data[0]}" .
					  "<a href='profile.php?u={$searchData[0][1]}' value='{$data[2]}' class='btn btn-primary btn-sm mr-2 float-right viewProfileBtn'>View Profile</a>" .
				 	  "<button value='{$data[2]}' class='btn btn-success btn-sm mr-2 float-right addfollowerBtn'> Follow</button></div>";
				} else{
					echo "<div class='list-group-item mb-3'> {$data[0]}" .
					  "<a href='profile.php?u={$searchData[0][1]}' value='{$data[2]}' class='btn btn-primary btn-sm mr-2 float-right viewProfileBtn'>View Profile</a>" .
				 	  "<button value='{$data[2]}' class='btn btn-success btn-sm mr-2 float-right unfollowerBtn'>Unfollow</button></div>";
				}
			}
		}
		
		 ?>

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

<?php
}
	require __DIR__ . "/includes/footer.php";
 ?>
