<?php
$highscore = $_COOKIE['highscore'];
$userid = $_COOKIE["userid"];


$dbc = mysqli_connect('localhost','root','','snekdatabase') or die('Could not connect: ' . mysqli_error($con));



$query = "INSERT INTO scores (`scores`, `user_iduser`) VALUES ('$highscore', '$userid') ON DUPLICATE KEY UPDATE scores=GREATEST($highscore, scores)" or die("frank");
mysqli_query($dbc, $query);

mysqli_close($dbc);
header("Location: ./index.php")
?>