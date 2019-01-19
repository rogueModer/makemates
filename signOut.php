<?php

require_once __DIR__ . "/init.php";

if(!LOGIN::isLoggedIn()){
      header('Location: index.php?please login to your account');
}

if(isset($_POST['allDevices'])){
    if(isset($_COOKIE['MMID_'])){
      DB::query('DELETE FROM login_tokens WHERE user_id=:user_id', array(':user_id'=>$_COOKIE['MMID_']));
    }
} else{
    if(isset($_COOKIE['MMID'])){
      DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['MMID'])));
    }
setcookie('MMID', '1', time()-3600, '/', NULL, NULL, TRUE);
setcookie('MMID_', '1', time()-3600, '/', NULL, NULL, TRUE);
}

header('Location: index.php');
