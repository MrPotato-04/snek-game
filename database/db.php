<?php
$dbhost ="rdbms.strato.de";
$dbuser ="dbu1876846";
$dbpass ="N5%?gKC3_aU4s!6";
$dbname ="dbs5845598";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
return $conn;

?>
