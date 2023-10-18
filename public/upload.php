<?php
if( isset($_FILES['fileToUpload'])) {
	// Where are we going to be writing to?
	$target_path  = getcwd() . "/uploads/";
	$target_path .= basename($_FILES['fileToUpload']['name']);

	// Allow only one file upload, to avoid TOCTOU
	// You can get shell on the docker and delete shell.php after every upload during testing
	if(file_exists('uploads/shell.php')) {
		header("Location: /?message=File+Already+Exists");
	}

	// Can we move the file to the upload folder?
	if(!move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target_path)) {
		// No
		header("Location: /?message=File+Upload+Failed");
	}
	else {
		// Yes!
		header("Location: /?message=File+Uploaded+Successfully");
	}
}
?>