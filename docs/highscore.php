<?php
$highscore = intval($_GET['score']);
$userid = $_COOKIE["userid"];

$con = mysqli_connect('localhost','root','','snekdatabase');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}


$query = "INSERT INTO scores (scores, user_id) VALUES ('$highscore', '$userid')";
mysqli_query($dbc, $query);

mysqli_close($con);
?>