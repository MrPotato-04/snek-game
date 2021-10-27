<?php

session_start();

//connect to database
$DB_DATABASE = "snekdatabase";
$DB_HOST = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";

$dbc = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE) or die("Couldn't connect to database");

if (mysqli_connect_errno()) {
    printf("Connection failed: ", mysqli_connect_errno());
    exit();
}

//initializing variables
$errors = array();

$username = $_POST['username'];
$email = $_POST['email'];
$remail = $_POST['remail'];
$password = $_POST['password'];

//Insert into database
$username = mysqli_real_escape_string($dbc, $_POST['username']);
$email = mysqli_real_escape_string($dbc, $_POST['email']);
$password = mysqli_real_escape_string($dbc, $_POST['password']);

//form validation
if(empty($username)) array_push($errors, "Username required"); $_SESSION['errors']=$errors; header("location: registerPage.php");
if(empty($email)) array_push($errors, "Email required"); $_SESSION['errors']=$errors; header("location: registerPage.php");
if(empty($password)) array_push($errors, "Password required"); $_SESSION['errors']=$errors; header("location: registerPage.php");
if($email !== $remail) array_push($errors, "Emails don't match"); $_SESSION['errors']=$errors; header("location: registerPage.php");

//email check
// function emailCheck($email, $remail) {
//     $error = false;
//     $errorMessage = "";

//     if($email === "" || $remail === "") {
//         $error = true;
//         $errorMessage = "Email is niet ingevuld";
//     }

//     $splitEmail = explode('@', $email);
//     if (count($splitEmail) > 2 && !$error) {
//         $error = true;
//         $errorMessage = 'Vul een geldige email in';
//     }

//     if($email !== $remail && !error) {
//         $error = true;
//         $errorMessage = "Emails zijn niet hetzelfde";
//     }

//     if($error) {
//         return $errorMessage;
//     } else {
//         return false;
//     }
// }

?>