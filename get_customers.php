<?php
include'config/dbConnection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filter = '';
if(!strstr($_SERVER['REQUEST_URI'], 'list_customers.php') && !empty($_GET['userid'])) {
	$filter = " where userid = '". $_GET['userid'] ."'";
}

// query to retrieve customer data
$cust_sql = "select * from customers $filter order by userid desc";
$cust_res = mysqli_query($DBCONN, $cust_sql);

$result = array();
if(strstr($_SERVER['REQUEST_URI'], 'list_customers.php')) {
	while ($row = mysqli_fetch_assoc($cust_res)) {
	    $result[] = $row;
	}
} else {
	$result = mysqli_fetch_assoc($cust_res);
}

//print_r($result);exit;
?>