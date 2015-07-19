<?php
error_reporting(E_ALL);
require("PHPMailer_5.2.4/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 2;
$mail->From = "admin@arcfolio.com";
$mail->FromName = "Arcfolio";
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "admin@arcfolio.com"; //SMTP user
$mail->Password = "Bulldog12!"; //SMTP pass
$mail->AddAddress("arcfolio@gmail.com", "ArcFolio");
$mail->AddAddress("joeycuty@gmail.com", "Joey");
$mail->AddAddress("cmr481@msstate.edu", "Curtis");
$mail->AddAddress("jcc388@msstate.edu", "Jarred");
$mail->AddReplyTo("admin@arcfolio.com");
$mail->WordWrap = 50;

$mail->isHTML(true);
$mail->Subject = 'SMTP Mail Server';
$mail->Body = "This message is a confirmation that the integration of Arcfolio's mail server was a success.
	       <br><br>
		Powered by PHP and google business apps";

if($mail->Send()) {echo"Send mail successfully";}
else {echo "Send mail fail";}
?>