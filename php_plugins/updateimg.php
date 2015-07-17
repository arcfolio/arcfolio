<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*
*	processes json string from angular for renaming imgs.
*
*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_GET['imgData']))
{
	$data = $_GET['imgData'];
	//grab defaults and autoloader
	include('IAL.php');
	
	//connect to database.//
	new mysqlConnector();
	
	//fight against SQL Injection.//
	$cleanData = new antiMalwareParser($data);
	$cleanData = $cleanData->get_array();
	
	$img = new updateImgs($cleanData);
	echo $img->get_results();
	exit();

}
else
{
	echo 'no data found';
	exit();
}
?>
