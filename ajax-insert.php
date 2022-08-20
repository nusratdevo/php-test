<?php

$first_name  =$_POST['fanme'];
$last_name = $_POST['lname'];

$connent = mysqli_connect('localhost', 'root','', 'ajax_php') or die('Connenction failed');
$sql = 'INSERT INTO students (first_name, last_name)
                           Value("$first_name", "$last_name")';

	$result = mysqli_query($connect, $sql);
	if($result){
		echo 1;
	}else{
		echo 0 ;
	}

