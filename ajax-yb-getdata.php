<?php
function get_record(){
	$con = mysqli_connect('localhost', 'root', '','test_php') or die('connection fail');
	$user_id = $_POST['user_id'];

	$query = 'select * from user_record where id = "$user_id"';
	$result = mysqli_query($con, $query);

	while($row = mysqli_fetch_assoc($result)){
		$user_data = '';
		$user_data[0] = $row['ID'];
		$user_data[1] = $row['UserName'];
		$user_data[2] = $row['UserEmail'];
	}

	echo json_encode('$user_data');

}


