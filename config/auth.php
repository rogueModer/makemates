<?php

	require_once '../init.php';


	if(isset($_POST['signUpBtn'])){
		$user = new USER;
		$status0 = USER :: signUp($_POST);
		echo $status0;
	}

	if(isset($_POST['loginBtn'])){
		$user = new USER;
		$status1 = USER :: login($_POST);

		echo $status1;

	}

	if(LOGIN::isLoggedIn()){
		if(isset($_GET['postBtn'])){
			LOGIN:: posting($_GET);
		}
	}

	if(LOGIN::isLoggedIn()){
		if(isset($_POST['profilepic'])){
			USER:: uploadProPic($_POST);


		}
	}

	if(LOGIN::isLoggedIn()){

		if(isset($_POST) || isset($_FILES)){
			$status = USER::post($_POST, $_FILES);
			echo $status;
		}
	}








 ?>
