<?php

$conn = mysqli_connect("localhost", "root","", "ajax_php") or die("Conection failed");

$sql = "SELECT*FROM students";

$result = mysqli_query($conn, $sql);

$output = '';
if(mysqli_num_rows($resutl) >0){
	$output .= '<table><tr>
	            <th width ="60px">Id</th>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
				</tr>';
				while($row = mysqli_fetch_assoc($result)){
					$output.="<tr>
					<td>{$row["id"]}</td>
					<td>{$row["first_name"]}  {$row["last_name"]}</td>
					<td>
					<button id='edit-btn' data-eid ='{row['id']}'>Edit</button>
					</td>
					<td><buttton class='delete-btn' data-id='{row['id']}'>Delete</button></td>
					</tr>";
					
				}
				$output.="</table>";
				mysqli_close();
				echo $output;
}else{
	echo "<h3>No Record has found</h3>";
}