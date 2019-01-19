<?php

class LOGIN
{
	public function isLoggedIn(){

		if(isset($_COOKIE['MMID'])){

			if(DB::query('SELECT `token` FROM `login_tokens` WHERE token = :token', array( ':token' => sha1($_COOKIE['MMID'])))) {
					return true;
			} else{
				return false;
			}

		}
	}

	public static function checkfollower($fData){

		if(DB::query('SELECT follower_user_id FROM add_followers WHERE user_id=:userid AND follower_user_id=:follower_user_id', array(':userid'=>$_COOKIE['MMID_'], ':follower_user_id'=>$fData[2]))){
			return "yes";
		}
		else{
			return "no";
		}
	}

	public static function posting($userPost){

		$textPost = $userPost['textPost'];
			DB::query('INSERT INTO `textpost` VALUES(\'\', :textpost, :user_id, NOW())', array(':textpost' => $textPost, ':user_id' => $_COOKIE['MMID_']));

			echo "post_success";

	}
}

 ?>
