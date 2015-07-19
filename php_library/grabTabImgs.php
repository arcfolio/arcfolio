<?PHP
//////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*	This class takes an email and password and grabs the users data from the database to use for login.
*
*/

class grabTabImgs
{
	
	public function __construct($id)
	{
		
		// check that user exists in db and pass correct //
		$sql = mysql_query("SELECT * FROM images WHERE `tabId`='$id'  AND `deleted`='0'");

		$sqlnum = mysql_num_rows($sql);
		// if db only has one entry.. //
		if($sqlnum > 0)
		{
			// create session //
			$count = 0;
				while($data = mysql_fetch_assoc($sql))
				{
					$row[$count]['id'] = $data['id'];
					$row[$count]['src'] = 'http://www.arcfolio.com/users/'.$data['ownerId'].'/tab_imgs/'.$data['id'].'.'.$data['filetype'];
					$row[$count]['description'] = $data['description'];
					$count++;
				
				}

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