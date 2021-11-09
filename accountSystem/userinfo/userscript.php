<?php
    session_start();
    $dbc = require './../../database/db.php';
    
    $userID = null;
    if (isset($_COOKIE['userid'])) {
        $userID = $_COOKIE["userid"];
    }

    //variables
    $username = $_POST['username'];
    $email = $_POST['email'];
    
    $userCheck ="SELECT COUNT(*) FROM user WHERE email = '$_POST[email]'";
    $rs= mysqli_query($dbc, $userCheck);
    $data= mysqli_fetch_array($rs, MYSQLI_NUM);

    //if field is empty
    if(empty($username) || empty($email)) {
        $_SESSION['errors'] = "Please fill all the fields in.";
        echo $_SESSION['errors'];
        header("location: userinfo.php");
    }

    //validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors']="email is invalid"; 
        header("location: userinfo.php");
    }

    //if no errors insert into database
    if(count($_SESSION['errors']) == 0) {
        $query = "UPDATE `user` SET email= '$_POST[email]', username= '$_POST[username]' WHERE iduser=$userID";
        mysqli_query($dbc, $query);
        header("location: userinfo.php");
    }
?>