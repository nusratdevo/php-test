<?php
function delete_record(){
	$con= mysqli_connect('localhost','root','','test_php') or die('connection faild');
	$del_id = $_POST['del_id'];
	$query=  'delete from uder_data where ID = "$del_id"';
	$result =mysqli_query($con,$query);

	if($query){
		echo 'your record successfully deleted';
	}else{
		echo 'please check your query'; 
	}


}