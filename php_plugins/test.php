<?php

if( $_GET['email'])
{
	$data = json_encode($_GET);
	
//grab defaults and autoloader
include('IAL.php');

//connect to database.//
new mysqlConnector();

$cleanData = new antiMalwareParser($data);
$cleanData = $cleanData->get_string();

//check passed data for errors

$errorFreeData = new errorParser($cleanData);
echo $errorFreeData->errors();
//if data has no errors, pass to register class.
if($errorFreeData->errors() == false)
{
	$user = new registerUser($cleanData);
}
else //errors found.
{
	//data has errors, return errorParsers() generated json string//
	echo $errorFreeData->get_errors();
}

	 
	 }
else
{echo 'no data found<br>';}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<form action="test.php" enctype='application/json' method="get" name="fired">
  <input name='email' value='joeycuty@gmail.com'>
  <input name='pass1' value='bulldog'>
  <input name='pass2' value='bulldog'>
  <button type="submit">fire</button>
</form>


</body>
</html>