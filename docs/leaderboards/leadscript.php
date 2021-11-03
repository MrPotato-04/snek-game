<?php
$dbc = require './../../database/db.php';
$res = $dbc->query("SELECT * FROM user, scores");
$row = $res->fetch_assoc();

?>