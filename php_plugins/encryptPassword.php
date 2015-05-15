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
		$this->salt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
		
		//append salt to password, run md5 hashing algorithm.//
		$this->encyptedPassword = md5($password . $salt);
		
		return array("password" => $encyptedPassword, "salt" => $salt);
	}
	
	public function get_array()
	{
		return array("password" => $this->encyptedPassword, "salt" => $this->salt);
	}

}

?>