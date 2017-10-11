<?php
include('config/config.php');
include('config/dbConnection.php');

// query to get total customer count for home page
	$cust_count = mysqli_query($DBCONN, "select count(1) as customer_count from customers;");
	$result = mysqli_fetch_assoc($cust_count);
?>