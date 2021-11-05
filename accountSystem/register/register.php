<?php

session_start();

//connect to database

$dbc = require './../../database/db.php';

if (mysqli_connect_errno()) {
    printf("Connection failed: ", mysqli_connect_errno());
    exit();
}

//global variables
$username = $_POST['username'];
$email = $_POST['email'];
$repass = $_POST['repass'];
$password = $_POST['password'];

$userCheck ="SELECT COUNT(*) FROM user WHERE email = '$_POST[email]'";
$rs= mysqli_query($dbc, $userCheck);
$data= mysqli_fetch_array($rs, MYSQLI_NUM);

//if field is empty
if(empty($username) || empty($email) || empty($password)) {
    $_SESSION['errors'] = "Please fill all the fields in.";
    header("location: registerPage.php");
}

//validation errors
if($password !== $repass) {
    $_SESSION['errors']="Passwords don't match ".$repass."/".$password; 
    header("location: registerPage.php");
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errors']="email is invalid"; 
    header("location: registerPage.php");
}
if($data[0] >=1) {
    $_SESSION['errors']="An account with that email already exists.";
    header("location: registerPage.php");
}

//insert into db 
if(count($_SESSION['errors']) == 0) {
    $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($dbc, $query);
    header("location: newUser.php");
}

?>