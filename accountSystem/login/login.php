<?php
    session_start();
    //connect to database
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $dbc = require './../../database/db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = $dbc->query("SELECT * FROM `user` WHERE email='{$email}' ORDER BY email");
    $row = $res->fetch_assoc();
     //variables
    $password = password_verify($password, $row['password']);
    
    //connection error  
    if (mysqli_connect_errno()) {
        printf("Connection failed: ", mysqli_connect_errno());
        exit();
    }


    //form validation errors
    if(!$row['email'] || !$row['password']) {
        $_SESSION['errors'] = 'Email or password is invalid';
        header("location: index.php");
        // echo $row . '<br/>' . "no";
        exit();
    }

    //data validation
    $_SESSION["userid"] = $row['iduser'];
    $_SESSION["email"] = $row['email'];
    setcookie("userid", $row['iduser'], 0 , "/"); /*time() + (86400)  = 1 day */
    setcookie("demo", "", -1, "/");
    // echo "You are now logged in!";
    header("location: /docs/gamemode.php");
