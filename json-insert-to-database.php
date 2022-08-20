<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JSON DATA Insert to Database</title>
</head>
<body>
	
  <div class="container">
	<h3>Import Json file into Mysql database</h3>
<?php 
$conn = mysqli_connect('localhost', 'root', '', 'test') or die("connection Failed");
$query = '';
$table_data='';
if(file_exists('employee_data.json')){
   $json_data = file_get_content('employee_data.json');
   $array_data = json_decode($json_data, true);

   foreach($array_data as $data ){
        $query.="INSERT INTO employee(name, age ,gender)Value('".$data["name"]."', '".$data["age"]."', '".$data["gender"]."')";

		$table_data .='<tr><td>' .$data["name"]. '</td><td>' .$data["age"]. '</td><td>' .$data["gender"]. '</td></tr>';
   }

   if(mysqli_multi_query($conn, $query)){
	echo '<h3> Json data inserted into database</h3>';
    echo ' <table>
          <tr>
		  <th>Name</th>
           <th>age</th>
		   <th>city></th>
		  </tr>';
	  echo $table_data;
      echo '</table>'  ; 
}
}else{
	echo 'no json file exists';
}




?>
  </div>
</body>
</html>