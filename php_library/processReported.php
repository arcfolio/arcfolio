<?php
class processReported
{
	
	public function __construct($package)
	{
		//decode json into a php array.//
		$obj = json_decode($package);
		
		$sql = "UPDATE images SET flagged = '1' WHERE id='$obj->imgId' LIMIT 1";
		
		if(mysql_query($sql)){
		
		$to = 'admin@arcfolio.com';	 
		$from = 'admin@arcfolio.com';
		$subject = 'Reported Image';
		$message = '<!DOCTYPE html><html>
					<head>
					<meta charset="UTF-8"><title>Arcfolio Reported Image Message</title>
					</head>
				
						
					
				<h2 style="text-align: center;"><b>A user has reported image. </b></h2>


				<p style="text-align: center;">
					ID =  <b>'.$obj->imgId.'</b> </p>
				
					<p style="text-align: center;"> Follow this link to view the image : <a style="font-weight: bold;" href="'.$obj->imgId.'" target="_blank">Click
Here</a></p>
						<span style="text-align: center;"><p>Reported
  Rule violation:<b style="font-weight: bold;">  '.$obj->rule.' </b></p></span>
  
				<p style="text-align: center;">Violation Description:
						  <b>'.$obj->comment.'</b>
						</p>

				<p></p>


		</html>';
		
		require("../phpmailer/class.phpmailer.php");
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->From = $from;
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
		$mail->AddAddress("joeycuty@gmail.com", "Joey");
		
		
		if($mail->send()) 
		{
			//generate a positive response array.//
			$this->strings =json_encode(array(
				"failure" => false
				));
		}
		else
		{
			//DATABASE ENTRY NOT SUCCESSFUL//
			
			//generate a negative response array.//
			$this->strings =json_encode(array(
				"failure" => true
				));	
		}
		
		}
		else		{
			//DATABASE ENTRY NOT SUCCESSFUL//
			
			//generate a negative response array.//
			$this->strings =json_encode(array(
				"failure" => true
				));	
		}

		
		
		
    }
	
	public function get_string()
	{
		return $this->strings;
	}
}
?>