<?PHP
//////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*	This class takes an email and password and grabs the users data from the database to use for login.
*
*/

class loginUser
{
	
	public function __construct($email, $password, $remember)
	{
		
		// check that user exists in db and pass correct //
		$sql = mysql_query("SELECT * FROM members WHERE `email`='$email'  AND `deleted`='0' LIMIT 1");

		$sqlnum = mysql_num_rows($sql);
		// if db only has one entry.. //
		if($sqlnum == 1)
		{
			// create session //
			$row = mysql_fetch_array($sql);

			if(isset($password) && !isset($checkpass))
			{	
				$checkpass = $row['password'];
				$salt = $row['salt'];
				$password = md5($password.$salt);
			}
			
			if($checkpass == $password)
			{
				//if($row['varified'] == 1)
				{
					//create dat session//
					$_SESSION['id'] 			= $row['id'];
					$id							= $row['id'];
					//$_SESSION['username'] 		= $row['username'];
					$_SESSION['password'] 		= $row['password'];
					//$_SESSION['pic_ext'] 		= $row['pic_ext'];
					//$_SESSION['name'] 			= $row['name'];
					$_SESSION['email']			= $row['email'];
					
					if($remember == 'asdasdf')
					{
					
						$encryptedID 	= base64_encode("g4enm2c0c4y3dn3727553".$row['id']);

						$encryptedPASS 	= base64_encode("g4enm2c0c4y3dn3727553".$password);

						setcookie("idCookie", $encryptedID, time()+60*60*24*100, "/"); // Cookie set to expire in about 30 days
						setcookie("passCookie", $encryptedPASS, time()+60*60*24*100, "/"); // Cookie set to expire in about 30 days
					}

					// find picture locations //
					//$filename1 = '/res/main_pimgs/profile_'.$row['id'].'.'.$row['pic_ext'];
					//$filename2 = '/res/site_imgs/default_profile.png';
					/*
					if(file_exists($_SERVER['DOCUMENT_ROOT'] .$filename1))
					{
						$_SESSION['profile_img_loc']   = 'http://www.thestarkmarket.com'.$filename1;
					}
					else
					{
						$_SESSION['profile_img_loc']   = 'http://www.thestarkmarket.com'.$filename2;
					}
					
					

					$filename1 = '/res/main_timgs/thumb_'.$row['id'].'.'.$row['pic_ext'];
					$filename2 = '/res/site_imgs/default_thumb.png';

					if(file_exists($_SERVER['DOCUMENT_ROOT'] .$filename1))
					{
						$_SESSION['thumb']   = 'http://www.thestarkmarket.com'.$filename1;
					}
					else
					{
						$_SESSION['thumb']   = 'http://www.thestarkmarket.com'.$filename2;
					}
					
					$_SESSION['thumb'] = $_SESSION['thumb'].'?'.time();
					//install cookie token
					$cookie_name = "PHPSessionInit";
					$encryptedID = base64_encode("g4enm2c0c4y3dn3727553".$_SESSION['id']);
					$cookie_value = $encryptedID;
					setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
					*/
					
					// set the last login time to now 
					mysql_query("UPDATE members SET lastlogin=now() WHERE id='$id' LIMIT 1");

					// increase the times logged in by 1 //
					mysql_query("UPDATE members SET `logintimes`=`logintimes`+1 WHERE id='$id' LIMIT 1");
					
					//serialize to json object.
					$this->strings = json_encode($_SESSION);
					
				}
			}
				else{
					
					
				
				if (isset($_COOKIE['idCookie'])) 
				{
					
					setcookie("PHPSESSID", '', time()-42000000, '/');
					setcookie("PHPSESSID", '', time()-42000000, '/');
					setcookie("_ga", '', time()-42000000, '/');
					
					setcookie("idCookie", '', time()-4200000, '/');
					
					setcookie("passCookie", '', time()-4200000, '/');
						
					unset($_COOKIE['idCookie']);
					unset($_COOKIE['passCookie']);
					
					// Destroy the session variables
					
					session_destroy();
					$_SESSION = array();

				}
					
					
					
					 $this->strings = json_encode(array(
      					"failure1" => true));
						
					}
		}
				else{
					
					
				
				if (isset($_COOKIE['idCookie'])) 
				{
					
					setcookie("PHPSESSID", '', time()-42000000, '/');
					setcookie("PHPSESSID", '', time()-42000000, '/');
					setcookie("_ga", '', time()-42000000, '/');
					
					setcookie("idCookie", '', time()-4200000, '/');
					
					setcookie("passCookie", '', time()-4200000, '/');
						
					unset($_COOKIE['idCookie']);
					unset($_COOKIE['passCookie']);
					
					// Destroy the session variables
					
					session_destroy();
					$_SESSION = array();

				}
					
					
					
					 $this->strings = json_encode(array(
      					"failure" => true));
						
					}
			
	}
	
	public function get_string()
	{
		return $this->strings;
	}
	
}
			
?>