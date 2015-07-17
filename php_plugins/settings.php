<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*
*	processes json string from angular for grabbing users tabs.
*
*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_GET['settingData']))
{
	$data = $_GET['settingData'];
	//grab defaults and autoloader
	include('IAL.php');
	
	//connect to database.//
	new mysqlConnector();
	
	//fight against SQL Injection.//
	
	$settings = new grabSettings($data);
	echo $settings->get_string();
	exit();

}
else
{
	echo 'no data found1';
	exit();
}
?>
