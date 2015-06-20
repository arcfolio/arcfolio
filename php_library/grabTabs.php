<?PHP
//////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*	This class takes an email and password and grabs the users data from the database to use for login.
*
*/

class grabTabs
{
	
	public function __construct($id)
	{
		
		// check that user exists in db and pass correct //
		$sql = mysql_query("SELECT * FROM tabs WHERE `ownerId`='$id'  AND `deleted`='0'");

		$sqlnum = mysql_num_rows($sql);
		// if db only has one entry.. //
		if($sqlnum > 0)
		{
			// create session //
				$row = mysql_fetch_assoc($sql);

					//serialize to json object.
					$this->strings = json_encode($row);
					
				
		}
		else
		{
			$this->strings = "no data found2";
		}
			
	}
	
	public function get_string()
	{
		return $this->strings;
	}
	
}
			
?>