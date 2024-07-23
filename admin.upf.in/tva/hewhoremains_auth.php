<?php
include "../../MCU/obdb.php";
session_start();
/*------------------------------------------------------------------------------------------------*/
/*------------------------------------------Class For user ---------------------------------------*/
/*------------------------------------------------------------------------------------------------*/
class Earth616_user extends multiverse_con{	
	public function check_user($username, $userpassword){
		$xavier="";
		$xavier_getquery=mysqli_query($this->upf_dbs, "
			SELECT
				id,
				name,
				email,
				contact,
				address,
				city_id,
				state_id,
				pincode,
				password,
				role
			FROM
			    users
			WHERE
			    (
			    	email='".mysqli_real_escape_string($this->upf_dbs, $username)."' OR 
			    	contact='".mysqli_real_escape_string($this->upf_dbs, $username)."'
			    ) AND
			    password='".mysqli_real_escape_string($this->upf_dbs, $userpassword)."'
		");
		if(mysqli_num_rows($xavier_getquery)>0){
			$xavier_result=mysqli_fetch_assoc($xavier_getquery);
			$_SESSION['upf_admin_info_id']=$xavier_result['id'];
			$_SESSION['upf_admin_info_name']=$xavier_result['name'];
			$_SESSION['upf_admin_role']=$xavier_result['role'];
			$xavier="success";
		}else{
			$xavier='not';
		}
		return $xavier;
	}
}
#<--------------------------------------------------------------------------------------------------------->
#<--------------------------------------Object sections of user class-------------------------------------->
#<--------------------------------------------------------------------------------------------------------->
// Add user
if(isset($_POST['user-login-access'])){
	$out='';
	$username = $_POST['username'];
	$userpassword = $_POST['userpassword'];
	if(empty($username) || empty($userpassword)){
		$out="empty";
	}else{
		$illuminati=new Earth616_user();
		$out=$illuminati->check_user($username, $userpassword);
	}
	echo $out;
}
?>