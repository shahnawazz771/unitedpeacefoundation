<?php 	
	// Configuration
	$db_host = 'localhost';
	$db_username = 'upf';
	$db_password = 'upf123#';
	$db_name = 'upf';
	// Connect to database
	$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: ". $conn->connect_error);
	}
?>