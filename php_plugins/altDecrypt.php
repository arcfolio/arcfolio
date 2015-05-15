<?php

/*
*	This class matches a user password to an encrypted hash.
*   Returns true if password and hash match
*	Returns false if not a match
*/

class altDecrypt 
{
	public function __construct($password, $encryptedPassword)
	{
		
		// append salt to password, run md5 hashing algorithm.//
		return password_verify($password, $encryptedPassword); // returns True if userPassWord and hash match
	}

}

?>