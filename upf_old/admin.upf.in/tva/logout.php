<?php
	session_start();
	$_SESSION['upf_admin_info_id']="";
	$_SESSION['upf_admin_info_name']="";
	unset($_SESSION['upf_admin_info_id']);
	unset($_SESSION['upf_admin_info_name']);
	header('location:../login.php');
?>