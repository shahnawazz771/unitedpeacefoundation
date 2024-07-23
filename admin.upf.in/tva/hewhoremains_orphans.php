<?php
include "../../MCU/obdb.php";
session_start();
/*------------------------------------------------------------------------------------------------*/
/*------------------------------------------Class For orphans ---------------------------------------*/
/*------------------------------------------------------------------------------------------------*/
class Earth616_orphans extends multiverse_con{	
	public function add_orphans($name, $filename, $phone){
		$xavier="";
		$date=date("Y-m-d H:i:s");
		$xavier_checkquery=mysqli_query($this->upf_dbs, "
			SELECT id FROM orphans WHERE phone='".mysqli_real_escape_string($this->upf_dbs, $phone)."'
		");
		if(mysqli_num_rows($xavier_checkquery)==0){
			$xavier_savequery=mysqli_query($this->upf_dbs, "INSERT INTO orphans (name, photo, phone, created_date, created_by) VALUES ('".mysqli_real_escape_string($this->upf_dbs, $name)."', '".mysqli_real_escape_string($this->upf_dbs, $filename)."', '".mysqli_real_escape_string($this->upf_dbs, $phone)."', '".$date."', '".mysqli_real_escape_string($this->upf_dbs, $_SESSION['upf_admin_info_id'])."')");
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


	public function show_orphans(){
		$xavier="";
		$xavier_getquery=mysqli_query($this->upf_dbs, "
			SELECT 
				O.*,
				U.name Uname
			FROM orphans O 
			LEFT JOIN users U 
			ON O.created_by=U.id 
		");
		if(mysqli_num_rows($xavier_getquery)>0){
			$slno=0;
			foreach($xavier_getquery as $row){
				$slno++;
				$xavier.='
					<tr>
						<td class="text-center">'.$slno.'</td>
						<td><img src="../upf_images/'.$row['photo'].'" width="100px"></td>
						<td>'.$row['name'].'</td>
						<td>'.$row['phone'].'</td>
						<td>'.date('d M Y h:i:s a', strtotime($row['created_date'])).'</td>
						<td>'.$row['Uname'].'</td>
						<td>
							<a href="javascript:void(0)" class="btn btn-info waves-effect waves-light upf-edit-orphans" id="'.$row['id'].'" data-toggle="modal" data-target=".bs-example-modal-center2"><i class="mdi mdi-pencil-outline"></i></a>
							<a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light upf-delet-orphans" id="'.$row['id'].'"><i class="mdi mdi-trash-can-outline"></i></a>
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

	// delete orphans	
	public function delete_orphans($orphans_id){
		$xavier="";
		$xavier_deletequery=mysqli_query($this->upf_dbs, "
			DELETE FROM orphans WHERE id='".mysqli_real_escape_string($this->upf_dbs, $orphans_id)."' 
		");
		if($xavier_deletequery){
			$xavier='success';
		}else{
			$xavier='no';
		}
		return $xavier;
	}


	public function edit_orphans($orphans_name, $orphans_id){
		$xavier="";
		$xavier_checkquery=mysqli_query($this->upf_dbs, "
			SELECT id FROM orphans WHERE name='".mysqli_real_escape_string($this->upf_dbs, $orphans_name)."' AND id<>'".mysqli_real_escape_string($this->upf_dbs, $orphans_id)."'
		");
		if(mysqli_num_rows($xavier_checkquery)==0){
			$xavier_savequery=mysqli_query($this->upf_dbs, "
				UPDATE orphans 
				SET 
					name='".mysqli_real_escape_string($this->upf_dbs, $orphans_name)."',
					updated_by='".mysqli_real_escape_string($this->upf_dbs, $_SESSION['upf_admin_info_id'])."' 
				WHERE 
					id='".mysqli_real_escape_string($this->upf_dbs, $orphans_id)."'
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

	public function call_orphans($orphans_id){
		$xavier="";
		$xavier_getquery=mysqli_query($this->upf_dbs, "SELECT * FROM orphans WHERE id='".mysqli_real_escape_string($this->upf_dbs, $orphans_id)."'");
		$xavier=mysqli_fetch_assoc($xavier_getquery);
		return $xavier;
	}
}
#<--------------------------------------------------------------------------------------------------------->
#<--------------------------------------Object sections of orphans class-------------------------------------->
#<--------------------------------------------------------------------------------------------------------->
// Add orphans
if(isset($_POST['add-orphans-btn'])){
	$out = '';
	$name = $_POST['add-orphans'];
	$photo = $_FILES['add-orphans-image'];
	$phone = $_POST['add-phonenumber'];

	if (empty($name)) {
    $out = "empty";
	} elseif (empty(@$_SESSION['upf_admin_info_id'])) {
	    $out = "logout";
	} else {
		// Handle image upload
		$target_dir = "../../upf_images/";
		$target_file = $target_dir . basename($photo["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		$check = getimagesize($photo["tmp_name"]);
		if ($check !== false) {
			$uploadOk = 1;
		} else {
			$out = "File is not an image.";
			$uploadOk = 0;
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			$out = "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Check file size (5MB maximum)
		if ($photo["size"] > 5000000) {
			$out = "Sorry, your file is too large.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			$out = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$out = "Sorry, your file was not uploaded.";
		} else {
			// If everything is ok, try to upload file
			if (move_uploaded_file($photo["tmp_name"], $target_file)) {
			    // Save data to database
			    $illuminati = new Earth616_orphans();
			    $filename=basename($photo["name"]);
			    $out = $illuminati->add_orphans($name, $filename, $phone);
			} else {
			    $out = "Sorry, there was an error uploading your file.";
			}
		}
	}
    echo $out;
}

// Load orphans
if(isset($_POST['load_orphans'])){
	$out='';

	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_orphans();
		$out=$illuminati->show_orphans();
	}
	echo json_encode($out);
}

// Load orphans
if(isset($_POST['delete_orphans'])){
	$out='';
	$orphans_id = $_POST['orphans_id'];
	// if (empty(@$_SESSION['upf_admin_info_id'])){
		// $out="logout";
	// }else{
		$illuminati=new Earth616_orphans();
		$out=$illuminati->delete_orphans($orphans_id);
	// }
	echo json_encode($out);
}

// edit orphans
if(isset($_POST['edit-orphans-btn'])){
	$out='';
	$orphans_name = $_POST['add-orphans'];
	$orphans_id = $_POST['add-orphans-id-hidden'];
	// if(empty($orphans_name)){
	// 	$out="empty";
	// // }else if (empty(@$_SESSION['upf_admin_info_id'])){
	// 	// $out="logout";
	// }else{
		$illuminati=new Earth616_orphans();
		$out=$illuminati->edit_orphans($orphans_name, $orphans_id);
	// }
	echo $out;
}

// Call orphans
if(isset($_POST['call_orphans'])){
	$out='';
	$orphans_id=$_POST['orphans_id'];
	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_orphans();
		$out=$illuminati->call_orphans($orphans_id);
	}
	echo json_encode($out);
}
?>