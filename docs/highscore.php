<?php
$highscore = $_COOKIE['highscore'];
$userid = $_COOKIE["userid"];



$dbc = mysqli_connect('localhost','root','','snekdatabase') or die('Could not connect: ' . mysqli_error($con));



$query = "INSERT INTO scores (scores, user_id) VALUES ('$highscore', '$userid')";
mysqli_query($dbc, $query);

mysqli_close($con);
?>