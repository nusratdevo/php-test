<?php
function update_value()
{
	$con = mysqli_connect('localhost', 'root','', 'test_php') or die('connection failed');
	$Update_ID = $_POST['U_ID'];
	$Update_User =$_POST['U_User'];
	$Update_Email = $_POST['U_Email'];

	$query = "update user_record set UserName='$Update_User', UserEmail='$Update_Email' where ID='$Update_ID '";
	$result = mysqli_query($con,$query);
	if($result)
	{
		echo ' Your Record Has Been Updated ';
	}
	else
	{
		echo ' Please Check Your Query ';
	}
}