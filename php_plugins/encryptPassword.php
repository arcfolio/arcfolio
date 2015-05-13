<?php

/*
*	This class encrypts and salts its input. returns both as a php array.
*
*/

class encryptPassword 
{
	public function __construct($password)
	{
		//generate 16 random chars//
		$salt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
		
		//append salt to password, run md5 hashing algorithm.//
		$encyptedPassword = md5($password . $salt);
		
		return array("password" => $encyptedPassword, "salt" => $salt);
	}

}

?>