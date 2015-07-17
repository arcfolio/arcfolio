<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*	This class takes a json string and creates a user row in the users table of the database.
*
*/

class registerUser
{
	
	public function __construct($package)
	{
		//decode json into a php array.//
		$obj = json_decode($package);
		
		//encrypt password and generate a salt for password using our encryptPassword() class.//
		$ProtectedPass = new encryptPassword($obj->pass1);
		$ProtectedPass = $ProtectedPass->get_array();
		
		//generate creation dates.//
		$date = date_create();
		$date = date_format($date, 'Y-m-d H:i:s');
		
		if($obj->company == NULL){ $sql = "INSERT INTO members (email, password, salt, creationDate, lastLogin) VALUES( '$obj->email', '$ProtectedPass[password]', '$ProtectedPass[salt]', '$date', '$date')"; }
		else{ $sql = "INSERT INTO members (email, password, salt, creationDate, lastLogin, company) VALUES( '$obj->email', '$ProtectedPass[password]', '$ProtectedPass[salt]', '$date', '$date', '$obj->company')"; }
		
		// add user to db //
		if(mysql_query($sql) or die (mysql_error()))
		{
			//DATABASE ENTRY SUCCESSFUL//
			
			// grab newly generated db id and set it as the users id //
			$userId = mysql_insert_id();
		
			if (!file_exists('../users/'.$userId)) 
				{
					mkdir('../users/'.$userId.'/tab_imgs', 0777, true);
					mkdir('../users/'.$userId.'/tab_thumbnails', 0777, true);
					mkdir('../users/'.$userId.'/pdfs', 0777, true);
				}
				
				$count = 1;
			while($count < 9)
			
			{
				$name = "tab #".$count;
				mysql_query("INSERT INTO `thestark_arcfolio`.`tabs` (`name`, `ownerId`) VALUES ('$name', '$userId')");
			$count++;
			}
			
			
				mysql_query("INSERT INTO `thestark_arcfolio`.`settings` (`userId`) VALUES ('$userId')");
			//EMAIL USER ACTIVATION CODE HERE.//
		
		
			//generate a positive response array.//
			$user_array = array(
				"failure" => false,
				"msg" => "Success! you will receive an activation email shortly."
				);
		}
		else
		{
			//DATABASE ENTRY NOT SUCCESSFUL//
			
			//generate a negative response array.//
			$user_array = array(
				"failure" => true,
				"msg" => "Failure. There was an error creating your account."
				);	
		}
		
		
		//create response json//
		$this->json_response = json_encode($user_array, true);
	}
	
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>