<?php include "Database.php";?>

<?php
$db=new Database();
$id= $_GET['id'];

$query = "SELECT * FROM students WHERE id=$id";
$read = $db->select($query)->fetch_assoc();

?>

<?php
if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($db->link, $_POST['student_name']);
	$age = mysqli_real_escape_string($db->link, $_POST['age']);
	$city = mysqli_real_escape_string($db->link, $_POST['city']);

	if($name=='' || $age=='' || city==''){
		$error= 'firld must not be empty';

	}else{
		$query= "UPDATE students SET 
		student_name = $name,
		age =$age,
		city = $city,
		WHERE id= $id";

		$update= $db->update($query);

	}
}


if(isset($error)){
	echo "<span>". $error. "<span>";
}
?>

<form action="update.php?id=<?php echo $id?>" method="post">
<table>
	<tr>
		<td>Name</td>
		<td><input type="text" name="student_name" value="<?php echo $read['student_name']?>"></td>
	</tr>
	<tr>
		<td>Age</td>
		<td><input type="text" name="age" value="<?php $read['age'] ?>"></td>
	</tr>

	<tr>
		<td>City</td>
		<td><input type="text" name="city" value="<?php echo $read['city'] ?>"></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="sumbit" name="submit" value="Update">
			<input type="reset" value="Cancel">
		</td>
	</tr>
</table>

</form>

<a href="index.php" class="btn btn-border-dark">back</a>