<?php

    require_once __DIR__  . "/init.php";

    if(!LOGIN::isLoggedIn()){
        header('Location: index.php?please Login To you account');
    }

    if(isset($_GET['addfollower'])){
        
        $addfuser_id = $_GET['addfollower'];
        if(isset($addfuser_id)){
            DB::query('INSERT INTO `add_followers` VALUES (\'\', :user_id, :follower_user_id)', array(
              ':user_id' => $_COOKIE['MMID_'],
              ':follower_user_id' => $addfuser_id
            ));
            echo "follower_add";
        }
    }

    if(isset($_GET['unfollower'])){

        $unfuser_id = $_GET['unfollower'];
        if(isset($unfuser_id)){
            DB::query('DELETE FROM `add_followers` WHERE follower_user_id= :follower_user_id', array(':follower_user_id' => $unfuser_id));
            echo "follower_removed";
        }
    }

?>
