<?PHP
//////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
*	This class takes an email and password and grabs the users data from the database to use for login.
*
*/

class updateTabs
{
	
	public function __construct($data)
	{
		$id = $data['id'];
		$real = $data['real'];
		$name = $data['name'];
		$ownerId = $data['ownerId'];
		
		if($real == false)
		{
			if(mysql_query("INSERT INTO `thestark_arcfolio`.`tabs` (`id`, `name`, `ownerId`) VALUES ('$id', '$name', '$ownerId')"))
			{
					$this->result = true;
			}
			else
			{	$this->result = false; }
		}
		else
		{
			$sql = mysql_query("SELECT * FROM tabs WHERE `id`='$id'  AND `deleted`='0' LIMIT 1");
			$sqlnum = mysql_num_rows($sql);
			// if db only has one entry.. //
			if($sqlnum == 1)
			{
				if(mysql_query("UPDATE  `thestark_arcfolio`.`tabs` SET  `name` =  '$name' WHERE  `tabs`.`id` ='$id';") &&
				mysql_query("UPDATE  `thestark_arcfolio`.`tabs` SET  `lastUpdated` =  NOW() WHERE  `tabs`.`id` ='$id';"))
				{
					$this->result = true;
				}
				else
				{	$this->result = false; }
			}
			else
			{
				$this->result = false;
			}
		}
			
	}
	
	public function get_results()
	{
		return $this->result;
	}
	
}
			
?>