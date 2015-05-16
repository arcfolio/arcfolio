<?php

/*
*	This class encrypts and salts its input using PHP's bcrypt algorithm. returns encrypted password.
*   -stronger than md5
*   -no need to store key
*   -decryptVerify returns true and password and hash match, false if otherwise
*/

class bcrypt 
{
	public function __construct($password, $encryptedPass = "")
	{
		
		//store Password and possible hash//
		 $this->encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
		 $this->userPass = $password;
		
		return $this->encryptedPassword;
	}
	
	private function encrypt()
	{
		//returns encrypted password
		return password_hash($this->userPass, PASSWORD_DEFAULT);
	}
	
	private function decryptVerify()
	{
		//returns true if match, false if non-match
		return password_verify($this->userPass, $this->encryptedPassword); 
	}

}

?>