<?php
include "../../MCU/obdb.php";
session_start();
/*------------------------------------------------------------------------------------------------*/
/*------------------------------------------Class For city ---------------------------------------*/
/*------------------------------------------------------------------------------------------------*/
class Earth616_gallery extends multiverse_con{	
	public function uploadImage($image, $title, $captured_date, $city, $state){
		$xavier="";
		$date=date("Y-m-d H:i:s");
			$xavier_savequery=mysqli_query($this->upf_dbs, "INSERT INTO gallery(file_path, title, captured_date, city_id, state_id, created_by, created_date) VALUES ( '".mysqli_real_escape_string($this->upf_dbs, $image)."', '".mysqli_real_escape_string($this->upf_dbs, $title)."', '".mysqli_real_escape_string($this->upf_dbs, $captured_date)."', '".mysqli_real_escape_string($this->upf_dbs, $city)."', '".mysqli_real_escape_string($this->upf_dbs, $state)."', '".mysqli_real_escape_string($this->upf_dbs, $_SESSION['upf_admin_info_id'])."', '".$date."')
			");
			if($xavier_savequery){
				$xavier="success";
			}else{
				$xavier="error";
			}

		return $xavier;
	}

	// show gallery
	public function load_gallery(){
		$xavier='
			<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
           	    <div class="card card-pre">
           	        <a href="javascript:void(0)" class="add-gallery-modal" data-toggle="modal" data-target=".bs-example-modal-center">
           	            <img class="card-img-top card-pre-img-top img-fluid" src="../img/plus-sign.jpg" alt="Add Gallery">
           	        </a>
           	    </div>
           	</div>
		';
		$xavier_getquery=mysqli_query($this->upf_dbs, "
			SELECT 
				G.*,
				C.name as city,
				S.name as state,
				U.name as username
			FROM gallery G  
			LEFT JOIN city C 
			ON G.city_id=C.id
			LEFT JOIN state S 
			ON G.state_id=S.id
			LEFT JOIN users U 
			ON C.created_by=U.id 
		");
		if(mysqli_num_rows($xavier_getquery)>0){
			$slno=0;
			foreach($xavier_getquery as $row){
				$slno++;
				$xavier.='
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="card card-post">
                            <img class="card-img-top card-img-top-post img-fluid" src="../upf_images/'.$row['file_path'].'" alt="'.$row['title'].'" style="height:237px">
                            <div class="card-body gallery-card-body-post">
                                <h4 class="card-title font-size-16 mt-0">'.$row['title'].'</h4>
                                <p class="card-text"><small class="text-muted">Last updated '.date('d M Y h:i:s a', strtotime($row['created_date'])).'</small></p>
                                <a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light upf-delet-gallery" id="'.$row['id'].'"><i class="mdi mdi-trash-can-outline"></i></a>
                            </div>
                        </div>
                    </div>
				';
			}
		}
		return $xavier;
	}

	// delete city	
	public function delete_gallery($id){
		$xavier="";
		$xavier_deletequery=mysqli_query($this->upf_dbs, "
			DELETE FROM gallery WHERE id='".mysqli_real_escape_string($this->upf_dbs, $id)."' 
		");
		if($xavier_deletequery){
			$xavier='success';
		}else{
			$xavier='no';
		}
		return $xavier;
	}
}
#<--------------------------------------------------------------------------------------------------------->
#<--------------------------------------Object sections of city class-------------------------------------->
#<--------------------------------------------------------------------------------------------------------->
// Add image
if(isset($_POST['add_gallery_btn'])){
	$out='';
	$illuminati=new Earth616_gallery();
	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
	 	$target_dir = "../../upf_images/";
	 	$target_file = $target_dir . basename($_FILES["imagename"]["name"]);
	 	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	 	$valid_extensions = array("jpg", "jpeg", "png", "gif");

	 	if(in_array($imageFileType, $valid_extensions)) {
	 	    if(move_uploaded_file($_FILES["imagename"]["tmp_name"], $target_file)) {
	 	        $image = basename($_FILES["imagename"]["name"]);
	 	        $title = $_POST['add_title'];
	 	        $captured_date = $_POST['add_captureddate'];
	 	        $city = $_POST['add_city'];
	 	        $state = $_POST['add_state'];

	 	        $out=$illuminati->uploadImage($image, $title, $captured_date, $city, $state);
	 	    } else {
	 	        $out="error_uploading_file";
	 	    }
	 	} else {
	 	    $out="invalid_file_type";
	 	}
	}
	echo $out;
}

// Load City
if(isset($_POST['load_gallery'])){
	$out='';

	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_gallery();
		$out=$illuminati->load_gallery();
	}
	echo json_encode($out);
}

// Load City
if(isset($_POST['delete_gallery'])){
	$out='';
	$id = $_POST['id'];
	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_gallery();
		$out=$illuminati->delete_gallery($id);
	}
	echo json_encode($out);
}
?>