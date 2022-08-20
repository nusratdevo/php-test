<?php
$student_id= $_POST['id'];
$firstName = $_POST['fisrtname'];
$lastName = $_POST['last_name'];

$connenct= mysqli_connect('localhost','root','', 'ajax_php') or die("connenction FAiled");
$sql = "UPDATE studetns SET
first_name = '{$firstName}',
last_name = '{$lastName}',
         WHERE id = {$student_id}";

		 $result = mysqli_query($connenct, $sql);
		 if($resutl){
			echo 1;
		 }else{
			echo 0;
		 }

