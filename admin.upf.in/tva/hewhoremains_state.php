<?php
include "../../MCU/obdb.php";
session_start();
/*------------------------------------------------------------------------------------------------*/
/*------------------------------------------Class For state ---------------------------------------*/
/*------------------------------------------------------------------------------------------------*/
class Earth616_state extends multiverse_con{	
	public function add_state($state_name){
		$xavier="";
		$date=date("Y-m-d H:i:s");
		$xavier_checkquery=mysqli_query($this->upf_dbs, "
			SELECT id FROM state WHERE name='".mysqli_real_escape_string($this->upf_dbs, $state_name)."'
		");
		if(mysqli_num_rows($xavier_checkquery)==0){
			$xavier_savequery=mysqli_query($this->upf_dbs, "
				INSERT INTO state(
					name,
					created_at
				) VALUES (
					'".mysqli_real_escape_string($this->upf_dbs, $state_name)."',
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


	public function show_state(){
		$xavier="";
		$xavier_getquery=mysqli_query($this->upf_dbs, "
			SELECT 
				C.id state_id,
				C.name state_name,
				U.name Uname,
				C.created_at createdat,
				C.updated_at updatedat
			FROM state C 
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
						<td>'.$row['state_name'].'</td>
						<td>'.$row['Uname'].'</td>
						<td>'.date('d M Y h:i:s a', strtotime($row['createdat'])).'</td>
						<td>'.$row['Uname'].'</td>
						<td>'.date('d M Y h:i:s a', strtotime($row['updatedat'])).'</td>
						<td>
							<a href="javascript:void(0)" class="btn btn-info waves-effect waves-light upf-edit-state" id="'.$row['state_id'].'" data-toggle="modal" data-target=".bs-example-modal-center"><i class="mdi mdi-pencil-outline"></i></a>
							<a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light upf-delet-state" id="'.$row['state_id'].'"><i class="mdi mdi-trash-can-outline"></i></a>
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

	// delete state	
	public function delete_state($state_id){
		$xavier="";
		$xavier_deletequery=mysqli_query($this->upf_dbs, "
			DELETE FROM state WHERE id='".mysqli_real_escape_string($this->upf_dbs, $state_id)."' 
		");
		if($xavier_deletequery){
			$xavier='success';
		}else{
			$xavier='no';
		}
		return $xavier;
	}


	public function edit_state($state_name, $state_id){
		$xavier="";
		$xavier_checkquery=mysqli_query($this->upf_dbs, "
			SELECT id FROM state WHERE name='".mysqli_real_escape_string($this->upf_dbs, $state_name)."' AND id<>'".mysqli_real_escape_string($this->upf_dbs, $state_id)."'
		");
		if(mysqli_num_rows($xavier_checkquery)==0){
			$xavier_savequery=mysqli_query($this->upf_dbs, "
				UPDATE state 
				SET name='".mysqli_real_escape_string($this->upf_dbs, $state_name)."' 
				WHERE id='".mysqli_real_escape_string($this->upf_dbs, $state_id)."'
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
#<--------------------------------------Object sections of state class-------------------------------------->
#<--------------------------------------------------------------------------------------------------------->
// Add state
if(isset($_POST['add-state-btn'])){
	$out='';
	$state_name = $_POST['add-state'];
	if(empty($state_name)){
		$out="empty";
	// }else if (empty(@$_SESSION['upf_login_info'])){
		// $out="logout";
	}else{
		$illuminati=new Earth616_state();
		$out=$illuminati->add_state($state_name);
	}
	echo $out;
}

// Load state
if(isset($_POST['load_state'])){
	$out='';

	// if (empty(@$_SESSION['upf_login_info'])){
		// $out="logout";
	// }else{
		$illuminati=new Earth616_state();
		$out=$illuminati->show_state();
	// }
	echo json_encode($out);
}

// Load state
if(isset($_POST['delete_state'])){
	$out='';
	$state_id = $_POST['state_id'];
	// if (empty(@$_SESSION['upf_login_info'])){
		// $out="logout";
	// }else{
		$illuminati=new Earth616_state();
		$out=$illuminati->delete_state($state_id);
	// }
	echo json_encode($out);
}

// edit state
if(isset($_POST['edit-state-btn'])){
	$out='';
	$state_name = $_POST['add-state'];
	$state_id = $_POST['add-state-id-hidden'];
	// if(empty($state_name)){
	// 	$out="empty";
	// // }else if (empty(@$_SESSION['upf_login_info'])){
	// 	// $out="logout";
	// }else{
		$illuminati=new Earth616_state();
		$out=$illuminati->edit_state($state_name, $state_id);
	// }
	echo $out;
}
?>