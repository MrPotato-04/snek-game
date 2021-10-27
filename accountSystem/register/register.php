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

$username = $_POST['username'];
$email = $_POST['email'];
$remail = $_POST['remail'];
$password = $_POST['password'];

//form validation
if(empty($username)) $_SESSION['errors']="Username required"; header("location: registerPage.php");
if(empty($email)) $_SESSION['errors']="Email required"; header("location: registerPage.php");
if(empty($password)) $_SESSION['errors']="Password required"; header("location: registerPage.php");
if($email !== $remail) $_SESSION['errors']="Emails don't match"; header("location: registerPage.php");

//insert into db 
if(count($_SESSION['errors']) == 0) {
    
    $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

    mysqli_query($dbc, $query);

}
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