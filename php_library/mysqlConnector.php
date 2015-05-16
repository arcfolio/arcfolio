<?php

/*
*	This class connects to the mysql database.
*
*/
class mysqlConnector 
{
	public function __construct($db = '', $dbHost = '', $dbUser = '', $dbPass = '')
	{
		if($db == '')		{  $db = DEFAULT_DB;};
		if($dbHost == '')	{  $dbHost = DEFAULT_DB_HOST;};
		if($dbUser == '')	{  $dbUser = DEFAULT_DB_USER;};
		if($dbPass == '')	{  $dbPass = DEFAULT_DB_PASS;};
		
		$link = mysql_connect("$dbHost","$dbUser","$dbPass") or die ("ERROR: mysqlConnector unable to connect to db. #1");
		
		$connect = mysql_select_db($db, $link) or die ("ERROR: mysqlConnector unable to connect to db. #2");
		
		if($connect) { return TRUE; } else { return FALSE;};		
	}
}

?>