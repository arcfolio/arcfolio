<?PHP
//////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*	This class takes an email and password and grabs the users data from the database to use for login.
*
*/

class mainImg
{
	
	public function __construct($id)
	{
		
					if(file_exists("../users/".$id."/main.jpg"))
					{	$row['mainimg']  = 	"http://www.arcfolio.com/users/".$id."/main.jpg"; }
					else
					if(file_exists("../users/".$id."/main.png"))
					{	$row['mainimg'] = 	"http://www.arcfolio.com/users/".$id."/main.png"; }
					else
					{	$row['mainimg'] = 	"http://www.arcfolio.com/res/images/cover1.jpg"; }
					
					//serialize to json object.
					$this->strings = json_encode($row);
					
			
	}
	
	public function get_string()
	{
		return $this->strings;
	}
	
}
			
?>