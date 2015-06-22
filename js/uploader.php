<?php
echo 'nothing';
die();

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
function createFileFromChunks($temp_dir, $fileName, $chunkSize, $totalSize, $count) {

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
			$degrees = 0;
			/*
			if($_GET['type'] == 'b')
			{
				$type = 'book';
				$main = 'book_bimgs';
				$thumb = 'book_timgs';	
			}
			else if($_GET['type'] == 'a')
			{
				$type = 'apt';
				$main = 'apt_aimgs';
				$thumb = 'apt_timgs';	
			}
			else
			{
				$type = 'other';
				$main = 'other_oimgs';
				$thumb = 'other_timgs';	
			}
			*/
			
			// continue only if this is a JPEG image
			if ( strtolower($info['extension']) == 'png' )
			{
			  
			  	
				$destdir = 'temp/final'.$count.'.png';			
				$source = imagecreatefrompng($filename) or notfound();
				$rotate = imagerotate($source,$degrees, 0);
				imagepng($rotate, $destdir);
				
			  $img = $rotate;
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
			  imagepng( $tmp_img, 'temp/finalt'.$count.'.png');
			
			  //unlink($tempfile);
			
			}
			else
			{
			  
				$destdir = 'temp/final'.$count.'.jpg';			
					
				$source = imagecreatefromjpeg($filename) or notfound();
				$rotate = imagerotate($source,$degrees, 0);
				imagejpeg($rotate, $destdir);
			  $img = $rotate;
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
			  imagejpeg( $tmp_img, 'temp/finalt'.$count.'.jpg');
			  
			  // unlink($tempfile);
			}
			imagedestroy($source);
			imagedestroy($rotate);
			
			


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

    $temp_dir = 'temp/';
    $chunk_file = $temp_dir.'/'.$_GET['flowFilename'].'.part'.$_GET['flowChunkNumber'];
    if (file_exists($chunk_file)) {
         header("HTTP/1.0 200 Ok");
       } else
       {
         header("HTTP/1.0 404 Not Found");
       }
    }



// loop through files and move the chunks to a temporarily created directory
	$count = 0;
if (!empty($_FILES)) foreach ($_FILES as $file) {
	$count++;
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
                $_POST['flowChunkSize'], $_POST['flowTotalSize'], $count);
    }
}

?>