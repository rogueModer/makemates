<?php

class DB {

	private static function connect(){
		$conn =  new PDO('mysql:host=localhost;dbname=makemates;charset=utf8', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		return $conn;
	}

	public static function query($query, $params = array() ){

		$stmt = self::connect()->prepare($query);
		$stmt->execute($params);

		if(explode(' ', $query)[0] == "SELECT"){
			$data = $stmt->fetchAll();
			return $data;
		}
	}

	public static function wish(){
		echo "It is working";
	}

}



 ?>
