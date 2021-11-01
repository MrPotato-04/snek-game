<?php
$highscore = $_COOKIE['highscore'];
$userid = $_COOKIE["userid"];

//test cookie
unlink("cookietest.txt");
$testFile = fopen("cookietest.txt", "w") or die("Unable to open file!");
fwrite($testFile, $_COOKIE["userid"]);
fclose($testFile);

$dbc = mysqli_connect('localhost','root','','snekdatabase') or die('Could not connect: ' . mysqli_error($con));



// $res = $dbc->query("SELECT * FROM scores WHERE user_iduser = $userid");
// $row = $res->fetch_assoc();



$query = "INSERT INTO scores (`scores`, `user_iduser`) VALUES ('$highscore', '$userid') ON DUPLICATE KEY UPDATE scores=$highscore" or die("frank");
mysqli_query($dbc, $query);

mysqli_close($dbc);
header("Location: ./index.php")
?>