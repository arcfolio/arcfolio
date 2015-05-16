<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*
*	processes json string from angular for creating an account and returns a positive or negative json response.
*
*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_GET['accountData']))
{
	$data = $_GET['accountData'];
		
	//grab defaults and autoloader
	include('IAL.php');
	
	//connect to database.//
	new mysqlConnector();
	
	//fight against SQL Injection.//
	$cleanData = new antiMalwareParser($data);
	$cleanData = $cleanData->get_string();
	
	//check passed data for errors
	
	$errorFreeData = new errorParser($cleanData);
	//if data has no errors, pass to register class.
	if($errorFreeData->errorsfound == false)
	{
		$user = new registerUser($cleanData);
		echo $user->json_response;
	}
	else //errors found.
	{
		//data has errors, return errorParsers() generated json string//
		echo $errorFreeData->json_errors;
	}
	exit();

}
else
{
	echo 'no data found';
	exit();
}
?>
