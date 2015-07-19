<?PHP
//////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*	This class takes an email and password and grabs the users data from the database to use for login.
*
*/

class updateSettings
{
	
	public function __construct($data)
	{
		$id = $data['id'];
		$type = $data['type'];
		$skill1 = $data['skill1'];
		$skill2 = $data['skill2'];
		$skill3 = $data['skill3'];
		$skill4 = $data['skill4'];
		$ownerId = $data['userId'];
		
		
			$sql = mysql_query("SELECT * FROM settings WHERE `userId`='$ownerId' LIMIT 1");
			$sqlnum = mysql_num_rows($sql);
			// if db only has one entry.. //
			if($sqlnum == 1)
			{
				if($type == 'skill1')
				{
					if(mysql_query("UPDATE  `arcfolio`.`settings` SET  `skill1` =  '$skill1' WHERE  `settings`.`userId` ='$ownerId';"))// &&
					//mysql_query("UPDATE  `thestark_arcfolio`.`tabs` SET  `lastUpdated` =  NOW() WHERE  `tabs`.`id` ='$id';"))
					{
						$this->result = true;
					}
					else
					{	$this->result = false; }
				}
				else
				if($type == 'skill2')
				{
					if(mysql_query("UPDATE  `arcfolio`.`settings` SET  `skill2` =  '$skill2' WHERE  `settings`.`userId` ='$ownerId';"))// &&
					//mysql_query("UPDATE  `thestark_arcfolio`.`tabs` SET  `lastUpdated` =  NOW() WHERE  `tabs`.`id` ='$id';"))
					{
						$this->result = true;
					}
					else
					{	$this->result = false; }
				}
				else
				if($type == 'skill3')
				{
					if(mysql_query("UPDATE  `arcfolio`.`settings` SET  `skill3` =  '$skill3' WHERE  `settings`.`userId` ='$ownerId';"))// &&
					//mysql_query("UPDATE  `thestark_arcfolio`.`tabs` SET  `lastUpdated` =  NOW() WHERE  `tabs`.`id` ='$id';"))
					{
						$this->result = true;
					}
					else
					{	$this->result = false; }
				}
				else
				if($type == 'skill4')
				{
					if(mysql_query("UPDATE  `arcfolio`.`settings` SET  `skill4` =  '$skill4' WHERE  `settings`.`userId` ='$ownerId';"))// &&
					//mysql_query("UPDATE  `thestark_arcfolio`.`tabs` SET  `lastUpdated` =  NOW() WHERE  `tabs`.`id` ='$id';"))
					{
						$this->result = true;
					}
					else
					{	$this->result = false; }
				}
				else
				{$this->result = false; }
				
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