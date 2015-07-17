<?PHP
//////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*	This class takes an email and password and grabs the users data from the database to use for login.
*
*/

class updateImgs
{
	
	public function __construct($data)
	{
		$id = $data['id'];
		$type = $data['type'];
		$name = $data['name'];
		$desc = $data['desc'];
		$ownerId = $data['ownerId'];
		
		
		
			$sql = mysql_query("SELECT * FROM images WHERE `id`='$id'  AND `deleted`='0' LIMIT 1");
			$sqlnum = mysql_num_rows($sql);
			// if db only has one entry.. //
			if($sqlnum == 1)
			{
				if($type == true)
				{
					if(mysql_query("UPDATE  `thestark_arcfolio`.`images` SET  `name` =  '$name' WHERE  `images`.`id` ='$id';"))// &&
					//mysql_query("UPDATE  `thestark_arcfolio`.`tabs` SET  `lastUpdated` =  NOW() WHERE  `tabs`.`id` ='$id';"))
					{
						$this->result = true;
					}
					else
					{	$this->result = false; }
				}
				else
				{
					if(mysql_query("UPDATE  `thestark_arcfolio`.`images` SET  `desc` =  '$desc' WHERE  `images`.`id` ='$id';"))// &&
					//mysql_query("UPDATE  `thestark_arcfolio`.`tabs` SET  `lastUpdated` =  NOW() WHERE  `tabs`.`id` ='$id';"))
					{
						$this->result = true;
					}
					else
					{	$this->result = false; }
				}
				
			}
			else
			{
				$this->result = false;
			}
		}
			
	
	public function get_results()
	{
		return $this->result;
	}
	
}
			
?>