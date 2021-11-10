<?php
    session_start();

    $dbc = require './../../database/db.php';

    $userID = null;
    if (isset($_COOKIE['userid'])) {
        $userID = $_COOKIE["userid"];
    }
    
    //variables
    $password = $_POST['password'];
    $repass = $_POST['repass'];

    //error check
    if(empty($password) || empty($repass)) {
        $_SESSION['errors'] = "Please fill all the fileds in.";
        header("location: changePass.php");
    }
    if($password !== $repass) {
        $_SESSION['errors'] = "Passwords don't match.";
        header("location: changePass.php");
    }

    //if no errors insert into database
    if(!isset($_SESSION['errors'])) {
        $query = "UPDATE `user` SET `password` = '$password' WHERE iduser = $userID";
        mysqli_query($dbc, $query);
        header("location: pass_success.php");

    }
?>