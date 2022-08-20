<?php

function display_record(){
	$con = mysqli_connect('localhost', 'root', '', 'test_php') or die('Connection Fauil');

	$value ="";

	$value ='<table class="table table-bordered">
	           <tr>
			   <td> User Id</td>
			   <td>User Name</td>
			   <td> user email</td>
			   <td>Edit</td>
			   <td>Delete<?td>
			   </tr>';

			   $query = 'select *from user_data';
			   $result = mysqli_query($con, $query);

			   while($row = mysqli_fetch_assoc($result)){
				$value.=' <tr>
				        <td>'.$row['ID'].'</td>
						<td> '.$row['UserName'].' </td>
						<td> '.$row['UserEmail'].' </td>
						<td>
						<button class="btn btn-success" id="btn_edit" data-id= '.$row['ID'].'><span>Edit</span></button>
						<button class ="btn btn_danger" id="btn_delete" data-detete = '.$row['ID'].'><span>Delete</span></button>
						</td>
				
				</tr>';
			   }

			   $value.= '</table>';
			   echo json_encode(['status'=>'success', 'html'=>$value]);
}