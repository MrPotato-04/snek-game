<?php
$highscore = $_COOKIE['highscore'];
$userid = $_COOKIE["userid"];
if ($userid == null) {header("location: gamemode.php");}
// echo $highscore;
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = require './../database/db.php';

if ($highscore == null) {$highscore = 0;}

$stmt = $conn->prepare("INSERT INTO `scores` (`scores`, `user_iduser`) VALUES (?, ?) ON DUPLICATE KEY UPDATE scores=GREATEST(?, scores)");
$stmt->bind_param('sis', $highscore, $userid, $highscore);
$stmt->execute();
$stmt->close();
header("location: gamemode.php")
?>