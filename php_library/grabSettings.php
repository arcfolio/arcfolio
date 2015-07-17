<?PHP
//////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*	This class takes an email and password and grabs the users data from the database to use for login.
*
*/

class grabSettings
{
	
	public function __construct($id)
	{
		
		// check that user exists in db and pass correct //
		$sql = mysql_query("SELECT * FROM settings WHERE `userId`='$id'");

		$sqlnum = mysql_num_rows($sql);
		// if db only has one entry.. //
		if($sqlnum > 0)
		{
			// create session //
				while($data = mysql_fetch_assoc($sql))
				{ $row[] = $data; }

					//serialize to json object.
					$this->strings = json_encode($row);
					
				
		}
		else
		{
			$this->strings = NULL;
		}
			
	}
	
	public function get_string()
	{
		return $this->strings;
	}
	
}
			
?>