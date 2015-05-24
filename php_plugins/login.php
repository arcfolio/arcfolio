<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*
*	processes json string from angular for logining in and returns a positive or negative json response.
*
*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_GET['loginData']))
{
	$data = $_GET['loginData'];
	//grab defaults and autoloader
	include('IAL.php');
	
	//connect to database.//
	new mysqlConnector();
	
	//fight against SQL Injection.//
	$cleanData = new antiMalwareParser($data);
	$cleanData = $cleanData->get_array();
	
	$login = new loginUser($cleanData['email'], $cleanData['password'], TRUE);
	echo $login->get_string();
	exit();

}
else
{
	echo 'no data found';
	exit();
}
?>
