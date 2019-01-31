<?php
  require_once __DIR__ . '/init.php';


  if(isset($_POST['nickName'])){
    $nickName = htmlspecialchars($_POST['nickName']);

      DB::query(' 
        UPDATE about SET `nickname` =  :nickname 
        WHERE user_id = :id', 
        array(
          ':id' => $_COOKIE['MMID_'], 
          ':nickname' => $nickName)
      );

      echo "saved";
  }

  if(isset($_POST['dob'])){
    $dob = htmlspecialchars($_POST['dob']);

      DB::query(' 
        UPDATE about SET `dob` =  :dob 
        WHERE user_id = :id', 
        array(
          ':id' => $_COOKIE['MMID_'], 
          ':dob' => $dob)
      );

      echo "saved";
  }

  if(isset($_POST['age'])){
    $age = htmlspecialchars($_POST['age']);

      DB::query(' 
        UPDATE about SET `age` =  :age 
        WHERE user_id = :id', 
        array(
          ':id' => $_COOKIE['MMID_'], 
          ':age' => $age)
      );

      echo "saved";
  }

  if(isset($_POST['contNo'])){
    $contNo = $_POST['contNo'];

      DB::query(' 
        UPDATE about SET `contactNo` =  :contactNo 
        WHERE user_id = :id', 
        array(
          ':id' => $_COOKIE['MMID_'], 
          ':contactNo' => $contNo)
      );

      echo "saved";
  }

  if(isset($_POST['status'])){
    $status = htmlspecialchars($_POST['status']);

      DB::query(' 
        UPDATE about SET `status` =  :status 
        WHERE user_id = :id', 
        array(
          ':id' => $_COOKIE['MMID_'], 
          ':status' => $status)
      );

      echo "saved";
  }


if(isset($_POST['relStatus'])){
    $relStatus = htmlspecialchars($_POST['relStatus']);

      DB::query(' 
        UPDATE about SET `relStatus` =  :relStatus 
        WHERE user_id = :id', 
        array(
          ':id' => $_COOKIE['MMID_'], 
          ':relStatus' => $relStatus)
      );

      echo "saved";
  }

  // Work and Education

 if(isset($_POST['scName']) || isset($_POST['scPsYr'])){
    
    $scDetails = array(
    	'scName' => $_POST['scName'],
    	'scPsYr' => $_POST['scPsYr']
    );

    $scDetails = serialize($scDetails);

      DB::query(' 
        UPDATE about SET `scDetails` =  :scDetails 
        WHERE user_id = :id', 
        array(
          ':id' => $_COOKIE['MMID_'], 
          ':scDetails' => $scDetails)
      );

      echo "saved";
  }

  if(isset($_POST['workN']) || isset($_POST['workD'])){
    
    $workDetails = array(
    	'workN' => $_POST['workN'],
    	'workD' => $_POST['workD']
    );

    $workDetails = serialize($workDetails);

      DB::query(' 
        UPDATE about SET `workDetails` =  :workDetails 
        WHERE user_id = :id', 
        array(
          ':id' => $_COOKIE['MMID_'], 
          ':workDetails' => $workDetails )
      );

      echo "saved";
  }


  if(isset($_POST['add1']) || isset($_POST['add2']) || isset($_POST['add3']) ){
    
    $ltDetails = array(
    	'add1' => $_POST['add1'],
    	'add2' => $_POST['add2'],
    	'add3' => $_POST['add3']
    );

    $ltDetails = serialize($ltDetails);

      DB::query(' 
        UPDATE about SET `ltDetails` =  :ltDetails 
        WHERE user_id = :id', 
        array(
          ':id' => $_COOKIE['MMID_'], 
          ':ltDetails' => $ltDetails )
      );

      echo "saved";
  }






 ?>
