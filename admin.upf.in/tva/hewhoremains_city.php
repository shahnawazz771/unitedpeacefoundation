<?php
include "../../MCU/obdb.php";
session_start();
/*------------------------------------------------------------------------------------------------*/
/*------------------------------------------Class For city ---------------------------------------*/
/*------------------------------------------------------------------------------------------------*/
class Earth616_city extends multiverse_con{	
	public function add_city($city_name){
		$xavier="";
		$date=date("Y-m-d H:i:s");
		$xavier_checkquery=mysqli_query($this->upf_dbs, "
			SELECT id FROM city WHERE name='".mysqli_real_escape_string($this->upf_dbs, $city_name)."'
		");
		if(mysqli_num_rows($xavier_checkquery)==0){
			$xavier_savequery=mysqli_query($this->upf_dbs, "
				INSERT INTO city(
					name,
					created_at
				) VALUES (
					'".mysqli_real_escape_string($this->upf_dbs, $city_name)."',
					'".$date."'
				)
			");
			if($xavier_savequery){
				$xavier="success";
			}else{
				$xavier="error";
			}
		}else{
			$xavier="duplicate";
		}

		return $xavier;
	}
}
#<--------------------------------------------------------------------------------------------------------->
#<--------------------------------------Object sections of city class-------------------------------------->
#<--------------------------------------------------------------------------------------------------------->
if(isset($_POST['add-city-btn'])){
	$out='';
	$city_name = $_POST['add-city'];
	if(empty($city_name)){
		$out="empty";
	// }else if (empty(@$_SESSION['upf_login_info'])){
		// $out="logout";
	}else{
		$illuminati=new Earth616_city();
		$out->illuminati->add_city($city_name);
	}
	echo $out;
}

?>