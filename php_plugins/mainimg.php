<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*
*	processes json string from angular for grabbing users tabs.
*
*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_GET['mainimgData']))
{
	$data = $_GET['mainimgData'];
	//grab defaults and autoloader
	include('IAL.php');
	
	//connect to database.//
	new mysqlConnector();
	
	//fight against SQL Injection.//
	
	$imgs = new grabMainImg($data);
	echo $imgs->get_string();
	exit();

}
else
{
	echo 'no data found1';
	exit();
}
?>
