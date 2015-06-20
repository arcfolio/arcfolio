<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*
*	processes json string from angular for grabbing users tabs.
*
*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_GET['tabData']))
{
	$data = $_GET['tabData'];
	//grab defaults and autoloader
	include('IAL.php');
	
	//connect to database.//
	new mysqlConnector();
	
	//fight against SQL Injection.//
	
	$tabs = new grabTabs($data);
	echo $tabs->get_string();
	exit();

}
else
{
	echo 'no data found1';
	exit();
}
?>
