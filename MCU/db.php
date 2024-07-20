<?php
date_default_timezone_set('Asia/Kolkata');
$server="localhost";
$user="upf";
$password="Unitedpeace123#";
$db="upf";
$con=mysqli_connect($server,$user,$password,$db) or die("could not connect");
mysqli_set_charset($con,'utf8');
?>
