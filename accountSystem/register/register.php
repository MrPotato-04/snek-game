<?php
$errors = null;

//connect to database
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = require './../../database/db.php';


//global variables
$username = $_POST['username'];
$email = $_POST['email'];
$repass = $_POST['repass'];
$password = $_POST['password'];
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$fourDigitRandomNumber = rand(1111,9999);
// sanitize this

//user email check
$stmt = $conn->prepare("SELECT COUNT(*) FROM `user` WHERE `email` = ?");
$stmt->bind_param('s', $email);
$stmt->execute();

$dataEmail = null;

$stmt->bind_result($dataEmail);
$stmt->fetch();
$stmt->close();
//username check
$stmt2 = $conn->prepare("SELECT COUNT(*) FROM `user` WHERE `username` = ?");
$stmt2->bind_param('s', $username);
$stmt2->execute();

$dataUser = null;

$stmt2->bind_result($dataUser);
$stmt2->fetch();
$stmt2->close();

// if field is empty
if(empty($username) || empty($email) || empty($password)) {
    $errors = "Please fill all the fields in.";
    header("location: registerPage.php");
}

//validation errors
if($password !== $repass) {
    $errors = "Passwords don't match ".$repass."/".$password; 
    header("location: registerPage.php");
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors ="email is invalid"; 
    header("location: registerPage.php");
}
if($dataEmail >=1) {
    $errors ="An account with that email already exists.";
    header("location: registerPage.php");
}
if($dataUser >=1) {
    $errors ="An account with that username already exists.";
    header("location: registerPage.php");
}
$_SESSION['errors'] = $errors;
// insert into db 
if($errors == null) {
    $stmt3 = $conn->prepare("INSERT INTO `user` (`iduser`, `username`, `email`, `password`) VALUES (?,?,?,?)");
    $stmt3->bind_param('ssss', $fourDigitRandomNumber, $username, $email, $passwordHash);
    $stmt3->execute();
    $stmt3->close();
    header("location: newUser.php");
} else {
    echo $errors;
}


?>