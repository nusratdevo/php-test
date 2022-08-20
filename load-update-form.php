<?php
$edit_id = $_POST['id'];

$connenct = mysqli_connect('localhost','root', '', 'ajax_php') or die("connenction failed");

$sql = "SELECT * FROM students WHERE id = $edit_id";
$result = mysqli_query($connenct, $sql);
 $output ="";
if(mysqli_num_rows($result) >0){
	while($row =mysqli_fetch_assoc($result)){
	
	$output = "<tr>
	<input type ='text' hidden id ='edit-id' value='{$row['id']}'>
	<td>first name</td>
	<td> <input type ='text' id='edit-fname' value='{$row['firstname']}'></td>
	</tr>
	<tr><td>Last name</td>
	<td><input type='text' id='edit-lname' value='{$row['last_name']}'></td></tr>
	<tr><td></td>
	<td><input type='submit' id='edit-submit' value='edit-submit'></td></tr>
	
	";
	}
	mysqli_close();
	echo $output;
}else{
	echo 'no record found';
}