<?php
$dbhost ="snekoncrack.privatedns.org:3306";
$dbuser ="snekuser";
$dbpass ="";
$dbname ="snekdatabase";

$dbc = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Could not connect: ' . mysqli_error($con));

return $dbc;
?>