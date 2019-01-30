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
    $contNo = htmlspecialchars($_POST['contNo']);

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




 ?>
