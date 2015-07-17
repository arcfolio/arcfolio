<?php
	
ini_set('memory_limit', '350M'); 
function _log($str) {
	// log to the output
    $log_str = date('d.m.Y').": {$str}\r\n";
    echo $log_str;
    // log to file
    if (($fp = fopen('upload_log.txt', 'a+')) !== false) {
        fputs($fp, $log_str);
        fclose($fp);
    }
}

/**
 * 
 * Delete a directory RECURSIVELY
 * @param string $dir - directory path
 * @link http://php.net/manual/en/function.rmdir.php
 */
function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir") {
                    rrmdir($dir . "/" . $object); 
                } else {
                    unlink($dir . "/" . $object);
                }
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

/**
 *
 * Check if all the parts exist, and 
 * gather all the parts of the file together
 * @param string $dir - the temporary directory holding all the parts of the file
 * @param string $fileName - the original file name
 * @param string $chunkSize - each chunk size (in bytes)
 * @param string $totalSize - original file size (in bytes)
 */
function createFileFromChunks($temp_dir, $fileName, $chunkSize, $totalSize) {

    // count all the parts of this file
    $total_files = 0;
    foreach(scandir($temp_dir) as $file) {
        if (stripos($file, $fileName) !== false) {
            $total_files++;
        }
    }

    // check that all the parts are present
    // the size of the last part is between chunkSize and 2*$chunkSize
    if ($total_files * $chunkSize >=  ($totalSize - $chunkSize + 1)) {

        // create the final destination file 
        if (($fp = fopen('temp/'.$fileName, 'w')) !== false) {
            for ($i=1; $i<=$total_files; $i++) {
                fwrite($fp, file_get_contents($temp_dir.'/'.$fileName.'.part'.$i));
                _log('writing chunk '.$i);
            }
            fclose($fp);
			
			
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$filename = 'http://www.thestarkmarket.com/arcfolio/php_library/temp/'.$fileName;
			$tempfile = 'temp/'.$fileName;
			
			
			 $info = pathinfo($fileName);
			 
				define('DEFAULT_DB_HOST' , 'localhost');
				 define('DEFAULT_DB_PASS' , 'arcfolio12');
				 define('DEFAULT_DB_USER' , 'thestark_AFMaker');
				 define('DEFAULT_DB' , 'thestark_arcfolio');
				 
				if($db == '')		{  $db = DEFAULT_DB;};
				if($dbHost == '')	{  $dbHost = DEFAULT_DB_HOST;};
				if($dbUser == '')	{  $dbUser = DEFAULT_DB_USER;};
				if($dbPass == '')	{  $dbPass = DEFAULT_DB_PASS;};
				
				$link = mysql_connect("$dbHost","$dbUser","$dbPass") or die ("ERROR: mysqlConnector unable to connect to db. #1");
				
				$connect = mysql_select_db($db, $link) or die ("ERROR: mysqlConnector unable to connect to db. #2");
				
			
				
			$userId = $_POST['userId'];
			$extension = $info['extension'];
			
			if(isset($_POST['mainImg']))
			{
				//$sql = mysql_query("INSERT INTO  `thestark_arcfolio`.`images` (`name`, `filetype` , `main`,`ownerId`) VALUES ('$fileName', '$extension',  TRUE,  '$userId')") or die(mysql_error()); 
			}
			else 
			if(isset($_POST['pdf']))
			{
					//$sql = mysql_query("INSERT INTO  `thestark_arcfolio`.`images` (`name`, `filetype` , `pdf`,`ownerId`) VALUES ('$fileName', '$extension',  TRUE,  '$userId')") or die(mysql_error()); 
			}
			else 
			{
				$tabId = $_POST['tabId'];
				$sql = mysql_query("INSERT INTO  `thestark_arcfolio`.`images` (`name`, `filetype` , `tabId`,`ownerId`) VALUES ('$fileName', '$extension',  '$tabId',  '$userId')") or die(mysql_error()); 
			}
			$imgId = mysql_insert_id();
			// continue only if this is a JPEG image
			if ( strtolower($info['extension']) == 'pdf' )
			{
				$sql = mysql_query("INSERT INTO  `thestark_arcfolio`.`images` (`name`, `filetype` , `pdf`,`ownerId`) VALUES ('$fileName', '$extension',  TRUE,  '$userId')") or die(mysql_error()); 
			  
				if(isset($_POST['pdf']))
				{
					$destdir = '../users/'.$userId.'/resume.pdf';
					if(file_exists($destdir))
					{unlink($destdir);}	
					move_uploaded_file($tempfile, $destdir);		
					unlink($tempfile);
				}
				else
				{
					$destdir = '../users/'.$userId.'/pdfs/'.$imgId.'.pdf';	
					move_uploaded_file($tempfile, $destdir);		
					unlink($tempfile);
				}
				
			}
			else if ( strtolower($info['extension']) == 'png' )
			{
			  
				if(isset($_POST['mainImg']))
				{
					$destdir = '../users/'.$userId.'/main.png';
					if(file_exists($destdir))
					{unlink($destdir);}	
				}
				else
				{
				$destdir = '../users/'.$userId.'/tab_imgs/'.$imgId.'.png';	
				}
				$source = imagecreatefrompng($filename) or notfound();
				imagepng($source, $destdir);
				  $img = $source;
				  $width = imagesx( $img );
				  $height = imagesy( $img );
		
			  // calculate thumbnail size
			  $new_height = 600;
			  $new_width = floor( $width * ( $new_height / $height ) );
		
			  // create a new temporary image
			  $tmp_img = imagecreatetruecolor( $new_width, $new_height );
		
			  // copy and resize old image into new image
			  imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
		
			  // save thumbnail into a file
			  $destdir = '../users/'.$userId.'/tab_thumbnails/'.$imgId.'.png';			
				
			  imagepng( $tmp_img, $destdir);
			  
			  unlink($tempfile);
			}
			else
			{
			  
				if(isset($_POST['mainImg']))
				{
					$destdir = '../users/'.$userId.'/main.jpg';
					if(file_exists($destdir))
					{unlink($destdir);}	
				}
				else
				{
					$destdir = '../users/'.$userId.'/tab_imgs/'.$imgId.'.jpg';	
				}
				$source = imagecreatefromjpeg($filename) or notfound();
				imagejpeg($source, $destdir);
			  $img = $source;
			  $width = imagesx( $img );
			  $height = imagesy( $img );
		
			  // calculate thumbnail size
			  $new_height = 300;
			  $new_width = floor( $width * ( $new_height / $height ) );
		
			  // create a new temporary image
			  $tmp_img = imagecreatetruecolor( $new_width, $new_height );
		
			  // copy and resize old image into new image
			  imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
		
			  // save thumbnail into a file
			  $destdir = '../users/'.$userId.'/tab_thumbnails/'.$imgId.'.jpg';
			 	imagejpeg( $tmp_img, $destdir);
				
				unlink($tempfile);
			
			}
			imagedestroy($source);
			
			


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
        } else {
            _log('cannot create the destination file');
            return false;
        }

        // rename the temporary directory (to avoid access from other 
        // concurrent chunks uploads) and than delete it
        if (rename($temp_dir, $temp_dir.'_UNUSED')) {
            rrmdir($temp_dir.'_UNUSED');
        } else {
            rrmdir($temp_dir);
        }
    }

}


////////////////////////////////////////////////////////////////////
// THE SCRIPT
////////////////////////////////////////////////////////////////////

//check if request is GET and the requested chunk exists or not. this makes testChunks work
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $temp_dir = 'temp/book_237.jpg';
    $chunk_file = $temp_dir.'/'.$_GET['flowFilename'].'.part'.$_GET['flowChunkNumber'];
    if (file_exists($chunk_file)) {
         header("HTTP/1.0 200 Ok");
       } else
       {
         header("HTTP/1.0 404 Not Found");
       }
    }



// loop through files and move the chunks to a temporarily created directory
if (!empty($_FILES)) foreach ($_FILES as $file) {

    // check the error status
    if ($file['error'] != 0) {
        _log('error '.$file['error'].' in file '.$_POST['flowFilename']);
        continue;
    }

    // init the destination file (format <filename.ext>.part<#chunk>
    // the file is stored in a temporary directory
    $temp_dir = 'temp/'.$_POST['flowIdentifier'];
    $dest_file = $temp_dir.'/'.$_POST['flowFilename'].'.part'.$_POST['flowChunkNumber'];

    // create the temporary directory
    if (!is_dir($temp_dir)) {
        mkdir($temp_dir, 0777, true);
    }
	
	
	//$dest_file = '/images/mypic.jpg';
    // move the temporary file
    if (!move_uploaded_file($file['tmp_name'], $dest_file)) {
        _log('Error saving (move_uploaded_file) chunk '.$_POST['flowChunkNumber'].' for file '.$_POST['flowFilename']);
    } else {

        // check if all the parts present, and create the final destination file
        createFileFromChunks($temp_dir, $_POST['flowFilename'],
                $_POST['flowChunkSize'], $_POST['flowTotalSize']);
    }
}

?>