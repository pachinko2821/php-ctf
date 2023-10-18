<?php
if( isset($_FILES['fileToUpload'])) {
	// Where are we going to be writing to?
	$target_path  = getcwd() . "/uploads/";
	$target_path .= basename($_FILES['fileToUpload']['name']);

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