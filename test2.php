<?php
include 'php_library/IAL.php';
$db = new mysqlConnector();
if($db) { echo 'works'; } else { echo 'doesnt work'; };

?>

this is a test.