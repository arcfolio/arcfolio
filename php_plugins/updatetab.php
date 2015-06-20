<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*
*	processes json string from angular for renaming tabs.
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
	$cleanData = new antiMalwareParser($data);
	$cleanData = $cleanData->get_array();
	
	$tab = new updateTabs($cleanData);
	echo $tab->get_results();
	exit();

}
else
{
	echo 'no data found';
	exit();
}
?>
