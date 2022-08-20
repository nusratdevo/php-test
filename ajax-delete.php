<?php

$delete_id = $_POST['student_id'];

$connenct= mysqli_connect('localhost','root','', 'ajax_php') or die('Connection Failed');
$sql = "DELETE FROM students WHERE id={$delete_id}";
$result = mysqli_query($connect, $sql);

if($result){
	echo 1;
}else{
	echo 0;
}