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
	//grab defaults and autoloader
	include('IAL.php');
	
	//connect to database.//
	new mysqlConnector();
	
	//fight against SQL Injection.//
	if(isset($_COOKIE['idCookie']) && isset($_COOKIE['passCookie']))

		{

			$encryptedID = $_COOKIE['idCookie'];
			$encryptedPASS = $_COOKIE['passCookie'];

			// decrypt cookies //

			$decryptedID = base64_decode($encryptedID);
			$decryptedPASS = base64_decode($encryptedPASS);
			
			$newID = str_replace('g4enm2c0c4y3dn3727553','',$decryptedID);
			$checkpass = str_replace('g4enm2c0c4y3dn3727553','',$decryptedPASS);
	
			$login = new loginUser($newID, $checkpass, TRUE, TRUE);
			echo $login->get_string();
			exit();

		}
		else
		{
	echo ' no data found here1. ';
	exit();

		}
}
else
{
	echo ' no data found here2. ';
	exit();
}
?>
