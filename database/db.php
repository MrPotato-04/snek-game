<?php
$dbhost ="rdbms.strato.de";
$dbuser ="dbu1046605";
$dbpass ="";
$dbname ="dbs5352653";

$dbc = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
echo $dbc->host_info . "\n";
//return $dbc;    
?>