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
	public function show_city(){
		$xavier="";
		$xavier_getquery=mysqli_query($this->upf_dbs, "
			SELECT 
				C.id city_id,
				C.name city_name,
				U.name Uname,
				C.created_at createdat,
				C.updated_at updatedat
			FROM city C 
			LEFT JOIN users U 
			ON C.created_by=U.id 
		");
		if(mysqli_num_rows($xavier_getquery)>0){
			$slno=0;
			foreach($xavier_getquery as $row){
				$slno++;
				$xavier.='
					<tr>
						<td class="text-center">'.$slno.'</td>
						<td>'.$row['city_name'].'</td>
						<td>'.$row['Uname'].'</td>
						<td>'.date('d M Y h:i:s a', strtotime($row['createdat'])).'</td>
						<td>'.$row['Uname'].'</td>
						<td>'.date('d M Y h:i:s a', strtotime($row['updatedat'])).'</td>
						<td>
							<a href="javascript:void(0)" class="btn btn-info waves-effect waves-light upf-edit-city" id="'.$row['city_id'].'"><i class="mdi mdi-pencil-outline"></i></a>
							<a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light upf-delet-city" id="'.$row['city_id'].'"><i class="mdi mdi-trash-can-outline"></i></a>
						</td>
					</tr>
				';
			}
		}else{
			$xavier='
				<tr>
					<td>No record found!!!</td>
				</tr>
			';
		}
		return $xavier;
	}
}
#<--------------------------------------------------------------------------------------------------------->
#<--------------------------------------Object sections of city class-------------------------------------->
#<--------------------------------------------------------------------------------------------------------->
// Add city
if(isset($_POST['add-city-btn'])){
	$out='';
	$city_name = $_POST['add-city'];
	if(empty($city_name)){
		$out="empty";
	// }else if (empty(@$_SESSION['upf_login_info'])){
		// $out="logout";
	}else{
		$illuminati=new Earth616_city();
		$out=$illuminati->add_city($city_name);
	}
	echo $out;
}

// Load City
if(isset($_POST['load_city'])){
	$out='';

	// if (empty(@$_SESSION['upf_login_info'])){
		// $out="logout";
	// }else{
		$illuminati=new Earth616_city();
		$out=$illuminati->show_city();
	// }
	echo json_encode($out);
}
?>