<?php
date_default_timezone_set('Asia/Kolkata');
// databaseconnectiviy
define('DB_SERVER','localhost');
define('DB_USER','upf');
define('DB_PASS' ,'Unitedpeace123#');
define('DB_NAME', 'upf');


class multiverse_con {
	function __construct(){
		$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
		mysqli_set_charset($con,'utf8');
		$this->upf_dbs=$con;
		// Check connection
		if (mysqli_connect_errno()){
			echo "Failed to connect to Database: " . mysqli_connect_error();
		}
	}
}

?>


