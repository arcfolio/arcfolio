<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*
*	processes json string from angular for grabbing users tabs.
*
*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_GET['reportedData']))
{
	$data = $_GET['reportedData'];
	
	//grab defaults and autoloader
	include('IAL.php');
	
	//connect to database.//
	new mysqlConnector();
	
	//fight against SQL Injection.//
	$cleanData = new antiMalwareParser($data);
	$cleanData = $cleanData->get_string();
	
	$reportedProcessed = new processReported($cleanData);
	echo $reportedProcessed->get_string();
	exit();

}
else
{
	echo 'no data found1';
	exit();
}
?>
