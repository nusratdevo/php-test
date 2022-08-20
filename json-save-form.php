<?php

if($_POST['fullname'] !== '' && $_POST['age'] !=='' && $_POST['city'] !==''){
	if(file_exists('json/student_data.json')){
		$current_data= file_get_content('json/student_data.json');
		$array_data = json_decode($current_data, true);
		$new_data = array(
			'name'=>$_POST['fullname'],
			'age'=>$_POST['age'],
			'city'=>$_POST['city']
		); 
		$array_data[] = $new_data;
		$json_data = json_encode($array_data, JSON_PRETTY_PRINT);
		if(file_put_content('json/student_data.json',$json_data)){
			echo '<h2> Successfully saved data in JSON file</h2>';
		}else{
			echo '<h3>Data not saved</h3>';
		}
	}else{
		echo 'Json file nor exist';
	}
}else{
	echo '<h3>All form field must be filed</h3>';
}


//// json file create
$conn = mysqli_connect("localhost","root","","testing") or die("Connection Failed");

$sql = "SELECT * FROM students";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

 $output = mysqli_fetch_all($result, MYSQLI_ASSOC); 

 $json_data = json_encode($output, JSON_PRETTY_PRINT);

 $file_name = "my-" . date("d-m-Y") . ".json";
 
 if(file_put_contents("json/{$file_name}", $json_data )){
 	echo $file_name . "File created.";
 }else{
	echo "Can't Insert data in JSON file.";
 }