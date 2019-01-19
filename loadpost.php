<?php 


require_once __DIR__ . "/init.php";



if(!LOGIN::isLoggedIn()){
	header('Location : index.php?please Login To your account');
}
	

	if(isset($_POST['q'])){
		
		$query = $_POST['q'];

		$upd = DB::query($query);

		echo json_encode($upd);


		

	}


 ?>