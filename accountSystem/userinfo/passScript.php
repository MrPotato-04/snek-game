<?php
    session_start();
    $dbc = require './../../database/db.php';
    
    //variables
    $password = $_POST['password'];
    $repass = $_POST['repass'];

    //error check
    if(empty($password) || empty($repass)) {
        $_SESSION['error'] = "Please fill all the fileds in.";
        header("location: changePass.php");
    }
    if($password !== $repass) {
        $_SESSION['error'] = "Please fill all the fileds in.";
        header("location: changePass.php");
    }
    // $query = "SELECT `password` FROM user WHERE `password` = '$_POST[password]'";
    // if($password == $_POST['password']) {
    //     $_SESSION['error'] = "Can't change the same password.";
    //     header("location: changePass.php");
    // }

    //if no errors insert into database
    if(count($_SESSION['errors']) == 0) {
        $query = "UPDATE `user` SET `password` = '$_POST[password]' WHERE iduser=$userID";
        mysqli_query($dbc, $query);
        header("location: changePass.php");
    }
?>