<?php
$dbhost ="rdbms.strato.de";
$dbuser ="dbu1046605";
$dbpass ="N5%?gKC3_aU4s!6";
$dbname ="dbs5352653";

$dbc = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
echo $dbc->host_info . "\n";
//return $dbc;    
?>