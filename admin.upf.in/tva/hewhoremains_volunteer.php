<?php
include "../../MCU/obdb.php";
session_start();
/*------------------------------------------------------------------------------------------------*/
/*------------------------------------------Class For user ---------------------------------------*/
/*------------------------------------------------------------------------------------------------*/
class Earth616_user extends multiverse_con{	
	public function show_volunteer(){
		$xavier="";
		$xavier_getquery=mysqli_query($this->upf_dbs, "
			SELECT `id`, `name`, `phone`, `email`, `skills`, `created_date` FROM `volunteers` ORDER BY TIMESTAMP(`created_date`) DESC
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
						<td>'.$row['skills'].'</td>
						<td>'.date('d M Y h:i:s a', strtotime($row['created_date'])).'</td>
						<td class="text-center">
							<a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light upf-delet-volunteer" id="'.$row['id'].'"><i class="mdi mdi-trash-can-outline"></i></a>
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

	// delete volunteer	
	public function delete_volunteer($id){
		$xavier="";
		$xavier_deletequery=mysqli_query($this->upf_dbs, "
			DELETE FROM volunteers WHERE id='".mysqli_real_escape_string($this->upf_dbs, $id)."' 
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
if(isset($_POST['load_volunteer'])){
	$out='';

	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_user();
		$out=$illuminati->show_volunteer();
	}
	echo json_encode($out);
}

// Load user
if(isset($_POST['delete_volunteer'])){
	$out='';
	$id = $_POST['id'];
	if (empty(@$_SESSION['upf_admin_info_id'])){
		$out="logout";
	}else{
		$illuminati=new Earth616_user();
		$out=$illuminati->delete_volunteer($id);
	}
	echo json_encode($out);
}
?>