<?php

session_start();
$dbConnect = array(
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'databaseName' => 'phpmyadmin');

$dbConnected = false;
if(!$dbConnected){
    
$dbsuccess = false;
$dbConnected  = mysqli_connect($dbConnect["hostname"], $dbConnect["username"],$dbConnect["password"]);

if ($dbConnected){
	$dbSelected   = mysqli_select_db($dbConnected,$dbConnect["databaseName"]);
	if ($dbSelected) {
		$dbsuccess=true;
	}
} 
else {echo "connection failed :( ";}

}

?>
