<?php
    //database connect
    $userID = null;
    if (isset($_COOKIE['userid'])) {
        $userID = $_COOKIE["userid"];
    }

    $dbc = require './../../database/db.php';
    $res = $dbc->query("SELECT iduser, username, email, password FROM user WHERE iduser='{$userID}'");
    $row = $res->fetch_assoc();
    
    //variables
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    //$repass = $_POST['repass'];

    //if field is empty
    if(empty($username) || empty($email) || empty($password)) {
        $_SESSION['errors'] = "Please fill all the fields in.";
        header("location: accinfo.php");
    }

?>