<?php
$highscore = $_COOKIE['highscore'];
$userid = $_COOKIE["userid"];
$dbc = require("./../database/db.php");

$query = "INSERT INTO scores (`scores`, `user_iduser`) VALUES ('$highscore', '$userid') ON DUPLICATE KEY UPDATE scores=GREATEST($highscore, scores)" or die("frank");
mysqli_query($dbc, $query);
echo $query;
mysqli_close($dbc);
header("Location: ./index.php")
?>