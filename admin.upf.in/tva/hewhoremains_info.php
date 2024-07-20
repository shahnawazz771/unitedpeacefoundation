<?php
include "../../MCU/obdb.php";
session_start();
/*------------------------------------------------------------------------------------------------*/
/*------------------------------------------Class For info ---------------------------------------*/
/*------------------------------------------------------------------------------------------------*/
class Earth616_info extends multiverse_con{	
	public function add_info($name_name, $domainname_name, $phonenumber_name,$email){
		$xavier="";
		$date=date("Y-m-d H:i:s");
		$xavier_checkquery=mysqli_query($this->upf_dbs, "
			SELECT id FROM info
		");
		if(mysqli_num_rows($xavier_checkquery)==0){
			$xavier_savequery=mysqli_query($this->upf_dbs, "
				INSERT INTO info(
					name,
					domain_name,
					phone_number,
					email,
					created_by,
					created_at
				) VALUES (
					'".mysqli_real_escape_string($this->upf_dbs, $name_name)."',
					'".mysqli_real_escape_string($this->upf_dbs, $domainname_name)."',
					'".mysqli_real_escape_string($this->upf_dbs, $phonenumber_name)."',
					'".mysqli_real_escape_string($this->upf_dbs, $email)."',
					'".mysqli_real_escape_string($this->upf_dbs, $_SESSION['upf_admin_info_id'])."',
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


	public function show_info(){
		$xavier="";
		$xavier_getquery=mysqli_query($this->upf_dbs, "
			SELECT 
				C.id info_id,
				C.name info_name,
				C.domain_name domain_name,
				C.phone_number phone_number,
				C.email email,
				U.name Uname,
				C.created_at createdat,
				C.updated_by updatedby,
				C.updated_at updatedat
			FROM info C 
			LEFT JOIN users U 
			ON C.created_by=U.id 
		");
		if(mysqli_num_rows($xavier_getquery)>0){
			$slno=0;
			foreach($xavier_getquery as $row){
				$slno++;
				$user_id=$row['updatedby'];
				$xavier_getupdaterqry=mysqli_query($this->upf_dbs, "
					SELECT name FROM users WHERE id='".$user_id."'
				");
				$result=mysqli_fetch_assoc($xavier_getupdaterqry);
				$updated_by=mysqli_num_rows($xavier_getupdaterqry)>0 ? $result['name'] : "";
				$xavier.='
					<tr>
						<td class="text-center">'.$slno.'</td>
						<td>'.$row['info_name'].'</td>
						<td>'.$row['domain_name'].'</td>
						<td>'.$row['phone_number'].'</td>
						<td>'.$row['email'].'</td>
						<td>'.$row['Uname'].'</td>
						<td>'.date('d M Y h:i:s a', strtotime($row['createdat'])).'</td>
						<td>'.$updated_by.'</td>
						<td>'.date('d M Y h:i:s a', strtotime($row['updatedat'])).'</td>
						<td>
							<a href="javascript:void(0)" class="btn btn-info waves-effect waves-light upf-edit-info" id="'.$row['info_id'].'" data-toggle="modal" data-target=".bs-example-modal-center"><i class="mdi mdi-pencil-outline"></i></a>
							<a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light upf-delet-info" id="'.$row['info_id'].'"><i class="mdi mdi-trash-can-outline"></i></a>
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

	// delete info	
	public function delete_info($info_id){
		$xavier="";
		$xavier_deletequery=mysqli_query($this->upf_dbs, "
			DELETE FROM info WHERE id='".mysqli_real_escape_string($this->upf_dbs, $info_id)."' 
		");
		if($xavier_deletequery){
			$xavier='success';
		}else{
			$xavier='no';
		}
		return $xavier;
	}


	public function edit_info($info_id, $name_name, $domainname_name, $phonenumber_name, $email){
		$xavier="";
		$xavier_savequery=mysqli_query($this->upf_dbs, "
			UPDATE info 
			SET 
				name='".mysqli_real_escape_string($this->upf_dbs, $name_name)."',
				domain_name='".mysqli_real_escape_string($this->upf_dbs, $domainname_name)."',
				phone_number='".mysqli_real_escape_string($this->upf_dbs, $phonenumber_name)."',
				email='".mysqli_real_escape_string($this->upf_dbs, $email)."',
				updated_by='".mysqli_real_escape_string($this->upf_dbs, $_SESSION['upf_admin_info_id'])."'  
			WHERE id='".mysqli_real_escape_string($this->upf_dbs, $info_id)."'
		");
		if($xavier_savequery){
			$xavier="success";
		}else{
			$xavier="error";
		}

		return $xavier;
	}

	public function call_info($info_id){
		$xavier="";
		$xavier_getquery=mysqli_query($this->upf_dbs, "
			SELECT
				name,
				domain_name,
				email,
				phone_number
			FROM
			    info
			WHERE
			    id='".mysqli_real_escape_string($this->upf_dbs, $info_id)."'
		");
		$xavier=mysqli_fetch_assoc($xavier_getquery);
		return $xavier;
	}
}
#<--------------------------------------------------------------------------------------------------------->
#<--------------------------------------Object sections of info class-------------------------------------->
#<--------------------------------------------------------------------------------------------------------->
// Add info
if(isset($_POST['add-info-btn'])){
	$out='';
	$name_name = $_POST['add-name'];
	$domainname_name = $_POST['add-domainname'];
	$phonenumber_name = $_POST['add-phonenumber'];
	$email = $_POST['add-email'];
	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_info();
		$out=$illuminati->add_info($name_name, $domainname_name, $phonenumber_name, $email);
	}
	echo $out;
}

// Load info
if(isset($_POST['load_info'])){
	$out='';

	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_info();
		$out=$illuminati->show_info();
	}
	echo json_encode($out);
}

// Load info
if(isset($_POST['delete_info'])){
	$out='';
	$info_id = $_POST['info_id'];
	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_info();
		$out=$illuminati->delete_info($info_id);
	}
	echo json_encode($out);
}

// edit info
if(isset($_POST['edit-info-btn'])){
	$out='';
	$info_id = $_POST['add-info-id-hidden'];
	$name_name = $_POST['add-name'];
	$domainname_name = $_POST['add-domainname'];
	$phonenumber_name = $_POST['add-phonenumber'];
	$email = $_POST['add-email'];
	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_info();
		$out=$illuminati->edit_info($info_id, $name_name, $domainname_name, $phonenumber_name, $email);
	}
	echo $out;
}

// Call info
if(isset($_POST['call_info'])){
	$out='';
	$info_id=$_POST['info_id'];
	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_info();
		$out=$illuminati->call_info($info_id);
	}
	echo json_encode($out);
}
?>