<?php 
// file name
$filename = $_FILES['fileDeber']['name'];

// Location
$location = 'img/deberes/'.$filename;

// file extension
$file_extension = pathinfo($location, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);

// Valid image extensions
$image_ext = array("jpg","png","jpeg","gif","txt","doc","docx", "pdf", "zip", "rar", "xlsx");

$response = 0;
if(in_array($file_extension,$image_ext)){
	// Upload file
	if(move_uploaded_file($_FILES['fileDeber']['tmp_name'],$location)){
		$response = $location;
	}
}

echo $response;