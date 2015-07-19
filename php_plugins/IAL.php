<?php


/**
 * Include Auto Loader.
 *
 * grabs sibling classes, as needed, in other class files.  Provides default constants.  Should be included at top of every class.
 **/
 
 //define some constants to be used sitewide.//
 define("DEFAULT_DB_HOST" , "localhost");
 define("DEFAULT_DB_PASS" , "Bulldog12!");
 define("DEFAULT_DB_USER" , "root");
 define("DEFAULT_DB" , "arcfolio");
 
 //configure autoloader.//
function my_autoloader($class) {
	require("../php_library/".$class.".php");
}

spl_autoload_register("my_autoloader");


?>