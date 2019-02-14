<?php 

require_once __DIR__ . "/init.php";

if(!LOGIN::isLoggedIn()){
	header('Location : index.php?please Login To your account');
}
	

if(isset($_POST['start'])){

	$start = $_POST['start'];
	$limit = 7;

	$conn = new PDO ('mysql:host=localhost;dbname=makemates', 'root', '');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = "SELECT post.id, post.user_id, post.un, users.fn, post.textPost, post.photoPost, post.date FROM post INNER JOIN users ON post.user_id = users.user_id order by date desc LIMIT " . $start . ", " . $limit;

	$stmt = $conn->query($query);

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

			$profilePic = DB::query('SELECT profilePicName FROM profilepic WHERE user_id = :id', array(':id' => $row['user_id']))[0][0];

			if(!empty($row['photoPost'])){

					echo "<div class='card mt-5' >
						<div class='card-header'>
							<div class='post_details'>
								<img src='public/profilePic/{$profilePic}' class='post-profile-img' />
								<span class='post-user-name'><a href='profile.php?u={$row['un']}'>{$row['fn']}</a></span><br>
								<span class='post-date'>Post at - {$row['date']}</span>
							</div>
						</div>
						<div class='card-body'>
							<div class='photo-content'>{$row['textPost']}</div>
							<div class='post-photo-box'>
								<img src='public/photoPost/{$row['photoPost']}' class='post-photo'>
							</div>
						</div>
					  </div>";
			} else{

				echo "<div class='card mt-5' >
						<div class='card-header'>
							<div class='post_details'>
								<img src='public/profilePic/{$profilePic}' class='post-profile-img' />
								<span class='post-user-name'><a href='profile.php?u={$row['un']}'>{$row['fn']}</a></span><br>
								<span class='post-date'>Post at - {$row['date']}</span>
							</div>
						</div>
						<div class='card-body'>
							<div class='text-content'>{$row['textPost']}</div>
						</div>
					  </div>";

			}	
	}

}



 ?>