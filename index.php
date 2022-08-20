<?php include "database.php";?>

<?php 
$db =new Database();
$query = "SELECT * FROM students";
$read = $db->select($query);

if(isset($_GET['msg'])){
	echo '<span style="color:geen">' .$_GET["msg"].'</span>'; 
}

?>

<table class="tblone">
	<tr>
		<th>Sl</th>
		<th>NAme</th>
		<th>Age</th>
		<th>City</th>
		<th>Action</th>
	</tr>
	<?php if($read){?>
		<?php 
			$i =1;
			while ($row = $read->fetch_assoc()){
		?>

		<tr>

		<td> <?php echo $i++?></td>
		<td> <?php echo $row['student_name']?></td>
		<td> <?php echo $row['age'] ?></td>
		<td> <?php echo $row['city'] ?></td>
		<td>
			<a href="update.php?id=<?php urlencode($row['id']); ?>">Edit</a>
			<a href="delete.php?id=<?php urlencode($row['id']);?>">Delete</a>

		</td>

		</tr>

<?php }?>
<?php }else{?>
	<p>Data not found</p>
	<?php }?>
</table>
