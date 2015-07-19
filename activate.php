

<?php

 

			$db_host = "localhost";
			$db_username = "root";  $db_pass = "Bulldog12!"; 
			//$db_username = "root"; $db_pass = "asdfasdf";
			$db_name = "arcfolio";	
			$link = mysql_connect("$db_host","$db_username","$db_pass") or die ("A major error has occured, we are working hard to resolve this.");
			mysql_select_db($db_name, $link) or die ("A major error has occured, we are working hard to resolve this.");
			
/**

 * Create Account Class

 * used for varifying the user emails

 * log new user into db.

 *

 * @author Joey Cuty

 * @copyright 2014 StarkvilleBookClub

 */



class activation

{
// initalize vars //
	public $msg	 = NULL;

	public $type = NULL;

	

	public function __construct($id, $e, $p)
	{

		// de-encode data //

		$id = htmlspecialchars($this->base64url_decode($id));

		$e  = htmlspecialchars($this->base64url_decode($e));

		$p  = htmlspecialchars($this->base64url_decode($p));
		
		// check user exists
		$sql = mysql_query("SELECT * FROM members WHERE `email`='$e'  AND `deleted`='0' LIMIT 1");

		$sqlnum = mysql_num_rows($sql);
		// if db only has one entry.. //
		if($sqlnum == 1)
		{
			// create session //
			$row = mysql_fetch_array($sql);


			$checkpass = $row['password'];
			$salt = $row['salt'];
			$password = md5($p.$salt);

		
			
			if($checkpass == $password)
				//if($row['varified'] == 1)
		
			{
				  // update user to varified //
				  $sqlu = mysql_query("UPDATE members SET activated='1' WHERE id='$id'");

				  

				  if($sqlu == TRUE)

				  {
					  
					// tell user they have been activated //
					 $success = "<h2>Your Account has been <b>Successfully Activated!</b>  You can now <b>login.</b>  You will be redirected in 5 seconds.</h2>";

					

				  }

				  else 

				  {

				  	
				    // tell user they had an error //
					$success = "There was an <b>error varifying your Account</b> Please contact admin at <b>loginhelp@arcfolio.com.</b>  You will be redirected in 5 seconds.";


					

				  }

			}

			else

			{

				    // tell user they had an error //
					$success = "There was an <b>error varifying your Account</b> Please contact admin at <b>loginhelp@thestarkmarket.com.</b>  You will be redirected in 5 seconds.";

					

			}

		

		

		
	}

	}

	
	// function decodes the base64 ecoding used in the url activation link //
	private function base64url_decode($data) 

	{

		

 		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));

  

	} 

	



}



if(isset($_GET['h']) && isset($_GET['i']) && isset($_GET['j']))

{

	

	$id 	 = $_GET['h'];

	$u1		 = $_GET['i'];

	$p1		 = $_GET['j'];

	

	$activate = new activation($id, $u1, $p1);

	

}





?>

<!--<meta http-equiv="refresh" content="5;url=http://www.arcfolio.com/">-->
<!DOCTYPE html>
<html lang='en'>

<head>
    <link rel="stylesheet" type="text/css" href="//arcfolio.com/res/CSS/main.css">
    <link rel="stylesheet" type="text/css" href="//arcfolio.com/res/CSS/design1.css">
</head>

<body class="mainbody">

<div class="visible-md-block visible-lg-block" style="margin-top:50px;"></div>
<div class="visible-xs-block visible-sm-block" style="margin-top:4px;"></div>

<div class="container" style="margin-left: 100px; margin-right: 100px;">


    

	
     <!----------------------------------------------------------------------------------------------------------------------------------------->


       <div class="row">
            <div class="col-xs-12" style="padding: 0;">
                <div id="testdiv" class="default-block" style="display:flex; align-items:center; height:500px;">
                        <h1 style="font-size: 40px; width: 100%; text-align:center; margin:0; color: #C9D6D8;"><?php echo $success; ?></h1>
                </div>
            </div>
       </div>
     
    
     <!----------------------------------------------------------------------------------------------------------------------------------------->
      

       </div>
       </body>


</html>



