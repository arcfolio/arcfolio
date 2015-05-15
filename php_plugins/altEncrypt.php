<?php

/*
*	This class encrypts and salts its input using PHP's bcrypt algorithm. returns encrypted password.
*   -stronger than md5
*   -no need to store key
*   -use with class altDecrypt to verify
*/

class altEncrypt 
{
	public function __construct($password)
	{
		
		//append salt to password, run md5 hashing algorithm.//
		$encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
		
		return $encryptedPassword;
	}

}

?>