<?php 

include 'config.php';
include 'database.php';
include 'Session.php';

$db = new database();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$email = strip_tags(mysqli_real_escape_string($db->link, trim($email)));
	$pass = strip_tags(mysqli_real_escape_string($db->link, trim($pass)));

	$query= 'SELECT* FROM test WHERE email = $email';
	$result = $db->select($query);

	if(mysqli_num_rows($result >0)){
		$data = mysqli_fetch_array($result);
		$pass_hash = $data['pass'];
		if (password_verify($pass , $pass_hash)){
			Session::set('userId', $data['id']);
			echo 'window.location = "index.php";';
		}else{
			echo' password not matched';
		}


	}


}