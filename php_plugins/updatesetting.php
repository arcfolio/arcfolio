<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*
*	processes json string from angular for renaming settings.
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
	$cleanData = new antiMalwareParser($data);
	$cleanData = $cleanData->get_array();
	
	$setting = new updateSettings($cleanData);
	echo $setting->get_results();
	exit();

}
else
{
	echo 'no data found';
	exit();
}
?>
