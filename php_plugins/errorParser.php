<?php

/*
*	This class takes a dirty json string and checks it for errors associated with certain forms.
*
*/
class errorParser 
{
	public function __construct($package, $type = '')
	{
		
		//unpackage json string into a php array
		$obj = json_decode($package);
					
		//check if type is default/user//
		if($type == '' || $type == 'user')
		{
			//check that no inputs are null.// (note: pass2 does not need a null check, it is match checked against pass1 later.)//
			
			//if($obj->username == NULL) 	{ $errors[] = "Username"; }
			
			if($obj->email == NULL) 		{ $errors[] = "Email"; }
			if($obj->pass1 == NULL) 		{ $errors[] = "Password"; }
			
			$errors[] = "spacer";
			
			if ( preg_match('/\s/',$obj->email) )  {$errors[] = '<b>Email</b> cannot contain spaces';}
			
			//if(strpos($this->email, '@msstate.edu') === FALSE && $this->email != NULL)	{ $errors[] = "<b>Email</b> is not an msstate.edu Account"; }
			
			//check that email/password is not overly long i.e. check for SQL INJECTION.//
			if(strlen($obj->email) > 40 && $this->email != NULL)	{ $errors[] = "<b>Email</b> is not valid."; }
			if(strlen($obj->pass1) > 30 && $this->pass1 != NULL)	{ $errors[] = "<b>Password</b> must be less than 30 chars."; }
			
			//keep a standard of password security.//
			if(strlen($obj->pass1) < 5 && $this->pass1 != NULL)	{ $errors[] = "<b>Password</b> must be greater than 5 chars."; }
			
			//check that passwords match..//
			if($obj->pass1 !== $obj->pass2 && $obj->pass1 != NULL)	{ $errors[] = "<b>Passwords</b> do not match"; }
			
			//check that email is not already in db.//
			$emailDUPLICATE = mysql_query("SELECT msue FROM users WHERE email='$obj->email' AND `delete`='0'");
			if($emailDUPLICATE)		{ $errors[] = "<b>Email</b> is already in our system"; }
		}
		
			
		// determine if errors exist //
		if(count($errors) != 1)
		{
			// errors exist, run them through the error message generator //
			return $this->errorMessageGenerator($errors);
		}
		else
		{
			// no errors exist, continue processing data //
			return TRUE;
		}
				
	}
	
	private function errorMessageGenerator($e)
	{
		//errorMessageGenerator is complex and hard to follow//
		//generates a gramatically correct error message regardless of # of errors.//
		
		// find what number in the queue the spacer is, this is the number of nulls errors found //
		$null_count = array_search("spacer", $e);
		// intialize count //
		$tot_count = count($e);
		// create basic error message //
		$errormsg = '';
		// null errors found //	
		if($null_count > 0)
		{
			$errormsg .= "Please fill <b>all required fields.</b> ";
		}

		// add to message if null exist and more errors exist//
		if($null_count > 0 && ($tot_count - 1 > $null_count))
		{
			$errormsg .= " Also, your ";
		}

		// no null errors but others present. //
		else if ($null_count == 0) 
		{
			$errormsg .= "Your "; $prefix = ". Also,";
		}

		// initialize some vars //			
		$first_msg = 	$e[$null_count + 1];		
		$second_msg = 	$e[2];
		$last_msg = 	$e[$tot_count - 1];

		// create basic error msg //
		for($i = $null_count+1; $i < $tot_count; ++$i)
		{
			if($e[$i] == $first_msg)				 {	$errormsg .= $e[$i];	}
			else if($e[$i]  == $second_msg) 		 {	$errormsg .= $prefix." your ".$e[$i];	}
			else if($e[$i]  == $last_msg) 			 {	$errormsg .= ", and your ".$e[$i];	}
			else									 {	$errormsg .= ", your ".$e[$i];	}
			if($i == $tot_count - 1){	$errormsg .= ".";	}
		}
		// set public var to msg //
		$array = array(
		"errors" => $e,
		"failure" => true,
		"errormsg" => $errormsg,
		);
		return json_encode($array);
	}
}

?>