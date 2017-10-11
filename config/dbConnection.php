<?php
$hostname = "localhost";
$username = "root";
$password = "WrjJ4hJ26Svn";
$database = "gwmotors";

//Create connection to database
$DBCONN = new mysqli($hostname, $username, $password, $database);

if ($DBCONN->connect_error) {
    die('Connect Error (' . $DBCONN->connect_errno . ') '
            . $DBCONN->connect_error);
}
?>



