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
						<td class="text-center">
							<a href="javascript:void(0)" class="btn btn-info waves-effect waves-light upf-edit-city" id="'.$row['city_id'].'" data-toggle="modal" data-target=".bs-example-modal-center"><i class="mdi mdi-pencil-outline"></i></a>
							<a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light upf-delet-city" id="'.$row['city_id'].'"><i class="mdi mdi-trash-can-outline"></i></a>
						</td>
					</tr>
				';
			}
		}else{
			$xavier='
				<tr>
					<td>No record found!</td>
				</tr>
			';
		}
		return $xavier;
	}

	// delete city	
	public function delete_city($city_id){
		$xavier="";
		$xavier_deletequery=mysqli_query($this->upf_dbs, "
			DELETE FROM city WHERE id='".mysqli_real_escape_string($this->upf_dbs, $city_id)."' 
		");
		if($xavier_deletequery){
			$xavier='success';
		}else{
			$xavier='no';
		}
		return $xavier;
	}


	public function edit_city($city_name, $city_id){
		$xavier="";
		$xavier_checkquery=mysqli_query($this->upf_dbs, "
			SELECT id FROM city WHERE name='".mysqli_real_escape_string($this->upf_dbs, $city_name)."' AND id<>'".mysqli_real_escape_string($this->upf_dbs, $city_id)."'
		");
		if(mysqli_num_rows($xavier_checkquery)==0){
			$xavier_savequery=mysqli_query($this->upf_dbs, "
				UPDATE city 
				SET name='".mysqli_real_escape_string($this->upf_dbs, $city_name)."' 
				WHERE id='".mysqli_real_escape_string($this->upf_dbs, $city_id)."'
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

	public function call_city($city_id){
		$xavier="";
		$xavier_getquery=mysqli_query($this->upf_dbs, "
			SELECT
				name
			FROM
			    city
			WHERE
			    id='".mysqli_real_escape_string($this->upf_dbs, $city_id)."'
		");
		$xavier=mysqli_fetch_assoc($xavier_getquery);
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
	// }else if (empty(@$_SESSION['upf_admin_info_id'])){
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

	// if (empty(@$_SESSION['upf_admin_info_id'])){
		// $out="logout";
	// }else{
		$illuminati=new Earth616_city();
		$out=$illuminati->show_city();
	// }
	echo json_encode($out);
}

// Load City
if(isset($_POST['delete_city'])){
	$out='';
	$city_id = $_POST['city_id'];
	// if (empty(@$_SESSION['upf_admin_info_id'])){
		// $out="logout";
	// }else{
		$illuminati=new Earth616_city();
		$out=$illuminati->delete_city($city_id);
	// }
	echo json_encode($out);
}

// edit city
if(isset($_POST['edit-city-btn'])){
	$out='';
	$city_name = $_POST['add-city'];
	$city_id = $_POST['add-city-id-hidden'];
	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_city();
		$out=$illuminati->edit_city($city_name, $city_id);
	}
	echo $out;
}

// Call city
if(isset($_POST['call_city'])){
	$out='';
	$city_id=$_POST['city_id'];
	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_city();
		$out=$illuminati->call_city($city_id);
	}
	echo json_encode($out);
}
?>