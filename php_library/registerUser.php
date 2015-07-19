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
		 error_reporting( error_reporting() & ~E_NOTICE );
		//decode json into a php array.//
		$obj = json_decode($package);
		
		//encrypt password and generate a salt for password using our encryptPassword() class.//
		$ProtectedPass = new encryptPassword($obj->pass1);
		$ProtectedPass = $ProtectedPass->get_array();
		
		//generate creation dates.//
		$date = date_create();
		$date = date_format($date, 'Y-m-d H:i:s');
		
		 $sql = "INSERT INTO members (email, password, salt, creationDate, lastLogin) VALUES( '$obj->email', '$ProtectedPass[password]', '$ProtectedPass[salt]', '$date', '$date')"; 
		 // $sql = "INSERT INTO members (email, password, salt, creationDate, lastLogin, company) VALUES( '$obj->email', '$ProtectedPass[password]', '$ProtectedPass[salt]', '$date', '$date', '$obj->company')"; }
		
		// add user to db //
		if(mysql_query($sql))
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
				mysql_query("INSERT INTO `arcfolio`.`tabs` (`name`, `ownerId`) VALUES ('$name', '$userId')");
			$count++;
			}
			
			
				mysql_query("INSERT INTO `arcfolio`.`settings` (`userId`) VALUES ('$userId')");
				
			//EMAIL USER ACTIVATION CODE HERE.//
			
		$new_id			 = rtrim(strtr(base64_encode($userId), '+/', '-_'), '=');
		$new_username	 = rtrim(strtr(base64_encode($obj->email), '+/', '-_'), '=');
		$new_pass		 = rtrim(strtr(base64_encode($obj->pass1), '+/', '-_'), '=');
		
		$to = $obj->email;	 
		$from = 'admin@arcfolio.com';
		$subject = 'ArcFolio Account Activation';
		$message = '<!DOCTYPE html><html>
					<head>
					<meta charset="UTF-8"><title>Arcfolio Activation Message</title>
					</head>					
										<div style="background: none repeat scroll 0% 0% rgb(51, 51, 51); font-size: 20px; color: rgb(204, 204, 204); border: 1px solid rgb(0, 0, 0); padding: 1%;">ArcFolio Account Activation</div>
											<div style="margin: 1%; margin-top:3%; margin-bottom: 3%">
												<blockquote style="margin: 0px 1% 1%;">
													<p style="padding-bottom: 0px; margin-bottom: 0px; padding-top: 1%; margin-top: 0px;">Hello <span style="color:  #2F64BA; font-weight: bold;">'.$obj->email.'</span>,</p>
													<p style="margin-left: 1%; text-indent: 7%; margin-top: 1%; margin-bottom: 1%;">Click the link below to activate your account when ready:</p>
													<p style="margin-left: 10%; margin-top: 2%; margin-bottom: 2%;"><b style="color: #3E3E3E;">Activate Account:</b> <b style=""><a style="color: rgb(105, 10, 12);" href="http://www.arcfolio.com/activate.php?h='.$new_id.'&amp;i='.$new_username.'&amp;j='.$new_pass.'">Click here to activate your account now</a></b></p>
		
													<h6 style="color: rgb(153, 153, 153); margin-left: 5%; margin-top: 1%; margin-bottom: 1%;">(Login after successful activation using your:)</h6>
															
<p style="margin-top: 0px; text-indent: 7%; margin-left: 1%; margin-bottom: 1px;"><b style="color: #3E3E3E;">Email: <span style="color: rgb(47, 100, 186);">'.$obj->email.'</span></b></p>

												</blockquote>
											</div>
		
					</html>';
		
		require("../phpmailer/class.phpmailer.php");
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->From = "admin@arcfolio.com";
		$mail->FromName = "Arcfolio";
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPSecure = "ssl";
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->Username = "admin@arcfolio.com"; //SMTP user
		$mail->Password = "Bulldog12!"; //SMTP pass
		$mail->WordWrap = 50;
		$mail->isHTML(true);
		$mail->Subject = $subject;
    	$mail->Body = $message;
    	$mail->AddAddress($to);
	
		
		if($mail->send()) 
		{
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

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}?>