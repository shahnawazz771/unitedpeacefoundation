<?php
include "../../MCU/obdb.php";
session_start();
/*------------------------------------------------------------------------------------------------*/
/*------------------------------------------Class For user ---------------------------------------*/
/*------------------------------------------------------------------------------------------------*/
class Earth616_user extends multiverse_con{	
	public function show_contact(){
		$xavier="";
		$xavier_getquery=mysqli_query($this->upf_dbs, "
			SELECT `id`, `name`, `phone`, `email`, `message`, `created_at` FROM `contact_us` ORDER BY TIMESTAMP(`created_at`) DESC
		");
		if(mysqli_num_rows($xavier_getquery)>0){
			$slno=0;
			foreach($xavier_getquery as $row){
				$slno++;
				$xavier.='
					<tr>
						<td class="text-center">'.$slno.'</td>
						<td>'.$row['name'].'</td>
						<td>'.$row['email'].'</td>
						<td>'.$row['phone'].'</td>
						<td>'.$row['message'].'</td>
						<td>'.date('d M Y h:i:s a', strtotime($row['created_at'])).'</td>
						<td class="text-center">
							<a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light upf-delet-contact" id="'.$row['id'].'"><i class="mdi mdi-trash-can-outline"></i></a>
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

	// delete contact	
	public function delete_contact($id){
		$xavier="";
		$xavier_deletequery=mysqli_query($this->upf_dbs, "
			DELETE FROM contact_us WHERE id='".mysqli_real_escape_string($this->upf_dbs, $id)."' 
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
#<--------------------------------------Object sections of user class-------------------------------------->
#<--------------------------------------------------------------------------------------------------------->
// Load user
if(isset($_POST['load_contact'])){
	$out='';

	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_user();
		$out=$illuminati->show_contact();
	}
	echo json_encode($out);
}

// Load user
if(isset($_POST['delete_contact'])){
	$out='';
	$id = $_POST['id'];
	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_user();
		$out=$illuminati->delete_contact($id);
	}
	echo json_encode($out);
}
?>