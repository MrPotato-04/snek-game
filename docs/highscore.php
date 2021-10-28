<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','snekDatabase');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}


$query = "INSERT INTO scores (";
mysqli_query($dbc, $query);

mysqli_close($con);
?>