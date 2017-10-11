<?php
include('config/config.php');
include'config/dbConnection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$userid = '';
$targetFolder = 'uploads/customer_photo/'; // Relative to the root

if($_SERVER["REQUEST_METHOD"] == "POST") {
	// delete multiple customer data
	$userid = isset($_POST['userid']) ? implode(',', $_POST['userid']) : '';
} else {
	// delete single customer data
	$userid = $_GET['userid'];
}

/* Redirect to a different page in the current directory that was requested */
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

if(empty($userid)) {
	$extra = 'list_customers.php?msg=No record selected to delete';
} else {
	// query to get customer photo details
	$cust_data = mysqli_query($DBCONN,"select userid, customer_photo from customers where userid in ($userid)");
	while ($row = mysqli_fetch_assoc($cust_data)) {
		$file = $row['customer_photo'];
		// remove customer photo
    	if( file_exists($targetFolder.$file) ) {
    		unlink($targetFolder.$file);
    	}
	}

	//query to delete customer data
	$delete_query = "delete from customers where userid in ($userid)";
	$success = mysqli_query($DBCONN, $delete_query);
	$extra = 'list_customers.php?msg=Record deleted successfully';
}

header("Location: http://$host$uri/$extra");
exit();
?>