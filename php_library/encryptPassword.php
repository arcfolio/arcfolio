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
		$this->salt = uniqid(mt_rand(), true);
		
		//append salt to password, run md5 hashing algorithm.//
		$this->encyptedPassword = md5($password . $this->salt);
		
		return array("password" => $encyptedPassword, "salt" => $this->salt);
	}
	
	public function get_array()
	{
		return array("password" => $this->encyptedPassword, "salt" => $this->salt);
	}

}

?>