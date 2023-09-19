<?php
include "../../MCU/obdb.php";
session_start();
/*------------------------------------------------------------------------------------------------*/
/*------------------------------------------Class For user ---------------------------------------*/
/*------------------------------------------------------------------------------------------------*/
class Earth616_user extends multiverse_con{	
	public function add_user($name_name, $email, $phonenumber, $address, $city, $state, $pincode, $password, $role){
		$xavier="";
		$date=date("Y-m-d H:i:s");
		$xavier_checkquery=mysqli_query($this->upf_dbs, "
			SELECT id FROM users WHERE 
			contact='".mysqli_real_escape_string($this->upf_dbs, $name_name)."' OR 
			email='".mysqli_real_escape_string($this->upf_dbs, $email)."'
		");
		if(mysqli_num_rows($xavier_checkquery)==0){
			$xavier_savequery=mysqli_query($this->upf_dbs, "
				INSERT INTO users(
					name,
					email,
					contact,
					address,
					city_id,
					state_id,
					pincode,
					password,
					role,
					created_by,
					created_at
				) VALUES (
					'".mysqli_real_escape_string($this->upf_dbs, $name_name)."',
					'".mysqli_real_escape_string($this->upf_dbs, $email)."',
					'".mysqli_real_escape_string($this->upf_dbs, $phonenumber)."',
					'".mysqli_real_escape_string($this->upf_dbs, $address)."',
					'".mysqli_real_escape_string($this->upf_dbs, $city)."',
					'".mysqli_real_escape_string($this->upf_dbs, $state)."',
					'".mysqli_real_escape_string($this->upf_dbs, $pincode)."',
					'".mysqli_real_escape_string($this->upf_dbs, $password)."',
					'".mysqli_real_escape_string($this->upf_dbs, $role)."',
					'".mysqli_real_escape_string($this->upf_dbs, "1")."',
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

	public function show_user(){
		$xavier="";
		$xavier_getquery=mysqli_query($this->upf_dbs, "
			SELECT 
				U.id user_id,
				U.name user_name,
				U.email email,
				U.contact phone_number,
				U.address address,
				U.pincode pincode,
				S.name statename,
				C.name cityname,
				US.name Uname,
				U.role role,
				U.created_at createdat,
				U.updated_at updatedat
			FROM users U 
			LEFT JOIN state S 
			ON U.state_id=S.id 
			LEFT JOIN city C
			ON U.city_id=C.id 
			LEFT JOIN users US 
			ON U.created_by=US.id 
		");
		if(mysqli_num_rows($xavier_getquery)>0){
			$slno=0;
			foreach($xavier_getquery as $row){
				$slno++;
				$xavier.='
					<tr>
						<td class="text-center">'.$slno.'</td>
						<td>'.$row['user_name'].'</td>
						<td>'.$row['email'].'</td>
						<td>'.$row['phone_number'].'</td>
						<td>'.$row['address'].'</td>
						<td>'.$row['cityname'].'</td>
						<td>'.$row['statename'].'</td>
						<td>'.$row['pincode'].'</td>
						<td>'.$row['role'].'</td>
						<td>'.$row['Uname'].'</td>
						<td>'.date('d M Y h:i:s a', strtotime($row['createdat'])).'</td>
						<td>'.$row['Uname'].'</td>
						<td>'.date('d M Y h:i:s a', strtotime($row['updatedat'])).'</td>
						<td>
							<a href="javascript:void(0)" class="btn btn-user waves-effect waves-light upf-edit-user" id="'.$row['user_id'].'" data-toggle="modal" data-target=".bs-example-modal-center"><i class="mdi mdi-pencil-outline"></i></a>
							<a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light upf-delet-user" id="'.$row['user_id'].'"><i class="mdi mdi-trash-can-outline"></i></a>
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

	// delete user	
	public function delete_user($user_id){
		$xavier="";
		$xavier_deletequery=mysqli_query($this->upf_dbs, "
			DELETE FROM users WHERE id='".mysqli_real_escape_string($this->upf_dbs, $user_id)."' 
		");
		if($xavier_deletequery){
			$xavier='success';
		}else{
			$xavier='no';
		}
		return $xavier;
	}


	public function edit_user($user_id, $name_name, $email, $phonenumber, $address, $city, $state, $pincode, $password, $role){
		$xavier="";
		$xavier_checkquery=mysqli_query($this->upf_dbs, "
			SELECT id FROM users WHERE (
				email='".mysqli_real_escape_string($this->upf_dbs, $email)."' OR 
				contact='".mysqli_real_escape_string($this->upf_dbs, $phonenumber)."'
			) AND id<>'".mysqli_real_escape_string($this->upf_dbs, $user_id)."'
		");
		if(mysqli_num_rows($xavier_checkquery)==0){
			$xavier_savequery=mysqli_query($this->upf_dbs, "
				UPDATE users 
				SET 
					name='".mysqli_real_escape_string($this->upf_dbs, $name_name)."',
					email='".mysqli_real_escape_string($this->upf_dbs, $email)."',
					contact='".mysqli_real_escape_string($this->upf_dbs, $phonenumber)."',
					address='".mysqli_real_escape_string($this->upf_dbs, $address)."',
					city_id='".mysqli_real_escape_string($this->upf_dbs, $city)."',
					state_id='".mysqli_real_escape_string($this->upf_dbs, $state)."',
					pincode='".mysqli_real_escape_string($this->upf_dbs, $pincode)."',
					password='".mysqli_real_escape_string($this->upf_dbs, $password)."',
					role='".mysqli_real_escape_string($this->upf_dbs, $role)."'
				WHERE 
					id='".mysqli_real_escape_string($this->upf_dbs, $user_id)."'
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

	public function call_user($user_id){
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
			    id='".mysqli_real_escape_string($this->upf_dbs, $user_id)."'
		");
		$xavier=mysqli_fetch_assoc($xavier_getquery);
		return $xavier;
	}
}
#<--------------------------------------------------------------------------------------------------------->
#<--------------------------------------Object sections of user class-------------------------------------->
#<--------------------------------------------------------------------------------------------------------->
// Add user
if(isset($_POST['add-user-btn'])){
	$out='';
	$name_name = $_POST['add-name'];
	$email = $_POST['add-email'];
	$phonenumber = $_POST['add-phonenumber'];
	$address = $_POST['add-address'];
	$city = $_POST['add-city'];
	$state = $_POST['add-state'];
	$pincode = $_POST['add-pincode'];
	$password = $_POST['add-password'];
	$role = $_POST['add-role'];
	if(empty($name_name) || empty($email) || empty($phonenumber) || empty($address) || empty($password)){
		$out="empty";
	// }else if (empty(@$_SESSION['upf_login_user'])){
		// $out="logout";
	}else{
		$illuminati=new Earth616_user();
		$out=$illuminati->add_user($name_name, $email, $phonenumber, $address, $city, $state, $pincode, $password, $role);
	}
	echo $out;
}

// Load user
if(isset($_POST['load_user'])){
	$out='';

	// if (empty(@$_SESSION['upf_login_user'])){
		// $out="logout";
	// }else{
		$illuminati=new Earth616_user();
		$out=$illuminati->show_user();
	// }
	echo json_encode($out);
}

// Load user
if(isset($_POST['delete_user'])){
	$out='';
	$user_id = $_POST['user_id'];
	// if (empty(@$_SESSION['upf_login_user'])){
		// $out="logout";
	// }else{
		$illuminati=new Earth616_user();
		$out=$illuminati->delete_user($user_id);
	// }
	echo json_encode($out);
}

// edit user
if(isset($_POST['edit-user-btn'])){
	$out='';
	$user_id = $_POST['add-user-id-hidden'];
	$name_name = $_POST['add-name'];
	$email = $_POST['add-email'];
	$phonenumber = $_POST['add-phonenumber'];
	$address = $_POST['add-address'];
	$city = $_POST['add-city'];
	$state = $_POST['add-state'];
	$pincode = $_POST['add-pincode'];
	$password = $_POST['add-password'];
	$role = $_POST['add-role'];
	// if(empty($user_name)){
	// 	$out="empty";
	// // }else if (empty(@$_SESSION['upf_login_user'])){
	// 	// $out="logout";
	// }else{
		$illuminati=new Earth616_user();
		$out=$illuminati->edit_user($user_id, $name_name, $email, $phonenumber, $address, $city, $state, $pincode, $password, $role);
	// }
	echo $out;
}

// Call user
if(isset($_POST['call_user'])){
	$out='';
	$user_id=$_POST['user_id'];
	// if (empty(@$_SESSION['upf_login_user'])){
		// $out="logout";
	// }else{
		$illuminati=new Earth616_user();
		$out=$illuminati->call_user($user_id);
	// }
	echo json_encode($out);
}
?>