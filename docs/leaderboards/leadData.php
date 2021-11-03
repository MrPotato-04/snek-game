<?php
$dbc = require './../../database/db.php';
$res = $dbc->query("SELECT * FROM `scores`, `user` WHERE iduser = scores.user_iduser GROUP BY user_iduser ORDER BY scores DESC LIMIT 10");


?>