<?php

if( $_GET['name'])
{
	
	var_dump($_GET);
	echo '<br>
<br>
';
	echo json_encode($_GET);
	 exit();}
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
  <input name='name' value='Bender'>
  <select name='hind'>
    <option selected>Bitable</option>
    <option>Kickable</option>
  </select>
  <input type='checkbox' name='shiny' checked>
  <button type="submit">fire</button>
</form>


</body>
</html>