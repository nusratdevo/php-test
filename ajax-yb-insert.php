<?php

function InsertRecord(){
	$con = mysqli_connect('localhost', 'root', '', 'test_php') or die('Connectin faile');

	$user_name = $_POST['u_name'];
	$user_email =$_POST['u_email'];

	$query = "insert into test_php(UserName,userEmail) values('$user_name', '$user_email')";
	$result = mysqli_query($con, $query);

	if($result){
		echo 'Your record has been inserted successfully';
	}else{
		echo 'Please check your query';
	}
}

?>