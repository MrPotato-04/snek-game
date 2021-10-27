<?php

session_start();

//connect to database
$DB_DATABASE = "snekdatabase";
$DB_HOST = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";

$dbc = mysqli_connect($DB_DATABASE, $DB_HOST, $DB_USERNAME, $DB_PASSWORD) or die("Couldn't connect to database");

if (mysqli_connect_errno()) {
    printf("Connection failed: ", mysqli_connect_errno());
    exit();
}

//initializing variables
$error = array();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

//Insert into database
$username = mysqli_real_escape_string($dbc, $_POST['username']);
$email = mysqli_real_escape_string($dbc, $_POST['email']);
$password = mysqli_real_escape_string($dbc, $_POST['password']);

//email check
function emailCheck() {
    
}

?>