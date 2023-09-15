<?php
date_default_timezone_set('Asia/Kolkata');
$server="localhost";
$user="root";
$password="";
$db="unitedpeacefoundation";
$con=mysqli_connect($server,$user,$password,$db) or die("could not connect");
mysqli_set_charset($con,'utf8');
?>
