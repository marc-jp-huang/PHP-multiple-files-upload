<?php
	$phpFileUploadErrors = array(
	    0 => 'There is no error, the file uploaded with success',
	    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
	    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
	    3 => 'The uploaded file was only partially uploaded',
	    4 => 'No file was uploaded',
	    6 => 'Missing a temporary folder',
	    7 => 'Failed to write file to disk.',
	    8 => 'A PHP extension stopped the file upload.',
	);


	$target_dir = "uploads/";
	$count = count($_FILES['uploads']['name']);
	for ($i = 0; $i < $count; $i++) {
	    //echo 'Name: '.$_FILES['uploads']['name'][$i].'<br/>';
	    $target_file = $target_dir . basename($_FILES["uploads"]["name"][$i]);
	    if(!file_exists($target_file)){
	    	move_uploaded_file($_FILES["uploads"]["tmp_name"][$i], $target_file);
	    }
	}
	for ($i = 0; $i < $count; $i++) {
	    echo $phpFileUploadErrors[$_FILES['uploads']['error'][$i]].'<br/>';
	}
?>