<?php include "Database.php";?>

<?php
$db= new Database();

if(isset($_POST['submit'])){
$name = mysqli_real_escape_string($db->link, $_POST['student_name']);
$age = mysqli_real_escape_string($db->link, $_POST['age']);
$city =mysqli_real_escape_string($bd->link. $_POST['city']);

if ($name=='' || $age=='' || $city==''){
	$error = 'field must not be empty';

}else{
	$query = "INSERT INTO students (student_name, age, city)
	Value('$name', '$age','$city' )";
	$create = $db->insert($query);
}
}


if(isset($error)){
	echo "<span>" .$error. "</span>";
}
?>

<form action="create.php" method="post">
	<table>
		<tr>
			<td>name</td>
			<td><input type="text" name="student_name" placeholder="please inter name"></td>
		</tr>

		<tr>
			<td>Age</td>
			<td><input type="text" name="age" placeholder=" inter age"></td>
		</tr>

		<tr>
			<td>City</td>
			<td><input type="text" name="city" placeholder="inter City"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Submit">
		<input type="reset" value=""cancel></td>
		</tr>
	</table>

</form>

<a href="index.php" class="btn btn-border-dark">Back</a>