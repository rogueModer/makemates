<?php

class USER
{
	public function signUp($user){

		$fn = filter_var($user['fullName'], FILTER_SANITIZE_STRING);
		$un = filter_var($user['username'], FILTER_SANITIZE_STRING);
		$email = filter_var($user['emailId'], FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
		$passkey = filter_var($user['passkey']);
		$cpasskey = filter_var($user['cpasskey']);


		// Checking for user Existance in Database

		if(!(DB::query('SELECT `un` FROM `users` WHERE `un` = :un', array(':un'=>$un))) AND !DB::query('SELECT `email` FROM `users` WHERE `email` = :email', array(':email'=>$email))) {

				if( strlen($fn) > 5 && strlen($fn) < 32 && strlen($un) > 5 && strlen($un) < 32 && strlen($passkey) > 3 && strlen($cpasskey) < 32 ){

						if($passkey == $cpasskey){

							// Inserting User Data in Database

							DB::query('INSERT INTO users VALUES(\'\', :fn, :un, :email, :password)', array(
									':fn' => $fn,
									':un' => $un,
									':email' => $email,
									':password' => password_hash($passkey, PASSWORD_BCRYPT)
							));

							DB::query('INSERT INTO about VALUES()');
							
							return json_encode(["status" => "success", "msg" => "Account Created Successfully."]);

						} else{
							return json_encode(["status" => "password_unmatched", "msg" => "Unmatched Password"]);
						}

				} else{
					return json_encode(["status" => "charsLength", "msg" => "All inputs should be between 5-32 characters."]);
				}

		} else{
			return json_encode(["status" => "un_or_email_in_use", "msg" => "Username or Email Id in use."]);
		}

	}

// Login User

	public function login($user){
		$un = filter_var($user['username'], FILTER_SANITIZE_STRING);
		$passkey = filter_var($user['passkey']);

		if(DB::query('SELECT `un` FROM `users` WHERE un = :un', array(':un' => $un))){

			if(password_verify($passkey, DB::query('SELECT `password` FROM `users` WHERE un = :un', array(':un' => $un))[0][0])){

					$cstrong = TRUE;
					$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
					$user_id = DB::query('SELECT `user_id` FROM `users` WHERE un = :un', array(':un' => $un))[0][0];

					DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token' =>sha1($token), ':user_id' => $user_id));

					setcookie('MMID', $token, time()+(60*60*24), '/', NULL, NULL, TRUE);
					setcookie('MMID_', $user_id, time()+(60*60*24), '/', NULL, NULL, TRUE);


					return json_encode(["status" => "login_in", "msg" => "Authenticated Successfully.", "page" => "index.php"]);

		} else {
			return json_encode(["status" => "incorrect_password", "msg" => "Incorrect username or password."]);
		}
		} else{
			return json_encode(["status" => "user_not_found", "msg" => "User not found."]);
		}
	}

	public static function uploadProPic($data){

		$data = $data['profilepic'];

		$image_array_1 = explode(";", $data);

		$image_array_2 = explode(",", $image_array_1[1]);

		$data = base64_decode($image_array_2[1]);

		// Profile Images Path

		$path = '../public/profilePic/' . time() . '.png';

		$imgName = time() . '.png';

		file_put_contents($path, $data);

		DB::query('INSERT INTO profilepic VALUES (\'\', :pic, :user_id, NOW()) ', array(':pic' => $imgName, ':user_id' => $_COOKIE['MMID_']));

		echo "success";

	}

}


?>
