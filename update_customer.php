<?php
	ini_set('post_max_size', '64M');
	ini_set('upload_max_filesize', '64M');
	include'config/dbConnection.php';
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);


	$userid = $_GET['userid'];
	$targetFolder = 'uploads/customer_photo/'; // Relative to the root
	$file = $result['customer_photo'];

	if(!empty($_FILES['customer_photo']['name'])) {

		// remove previous photo
    	if( file_exists($targetFolder.$file) ) {
    		unlink($targetFolder.$file);
    	}

		$tempFile = $_FILES['customer_photo']['tmp_name'];
    	$oldFileName = $_FILES['customer_photo']['name'];

    	$path_info = pathinfo($_FILES['customer_photo']['name']);
    	$file = time() . "." . $path_info['extension'];
    	$targetFile = $targetFolder . $file;

    	if( !move_uploaded_file($tempFile, $targetFile) ) { // upload new photo
    		$customerPhotoErr = "Error while file uploading, please try again";
           	$isError = 1;
           	return;
    	}
	}

	// query to update customer data
	$update_query = "update customers set 
					name = '" . $name . "',
					gender = '" . $gender . "',
					email = '" . $email . "',
					mobile_number = '" . $number . "',
					address = '" . $address . "',
					city = '" . $city . "',
					pincode = '" . $pincode . "', 
					owned_vehicle = '" . $ownedVehicle . "',
					details_given = '" . $detailsGiven . "',
					dob = '" . $dob . "', 
					customer_photo = '" . $file . "' where userid = $userid";

	$success = mysqli_query($DBCONN, $update_query);

	if(mysqli_error($DBCONN)) {
		$err_msg = 'MySQL Update Error: ' . mysqli_error($DBCONN);
		echo $err_msg;
		exit;
	}

	/* Redirect to a different page in the current directory that was requested */
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'list_customers.php?msg=Record updated successfully';

	header("Location: http://$host$uri/$extra");
	exit();
?>