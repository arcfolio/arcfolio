test

<?php

include 'php_plugins/IAL.php';

$db = new mysqlConnector();

if($db) { echo 'works'; } else { echo 'doesnt work'; };
die();

?>