<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>php Json</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
<div id="table-data">
	<form id="form-data" action="save-form.php" method="post">
		<table>
			<tr>
				<td><label for="">name</label></td>
				<td> <input type="text" name="fullname" autocomplate ="off"></td>
			</tr>
			<tr><td><label for="">Age</label></td>
			<td><input type="text" name="age"></td>
		   </tr>
		   <tr>
			<td><label for="">city</label></td>
			<td><input type="text" nama="city"></td>
		   </tr>
		   <tr>
			<td></td>
			<td><input type="submit" id="submit" name="submit"></td>
		   </tr>
		</table>
	</form>

	<div id="data-show">
		<table  id="show">
			<tr>
				<td>id</td>
				<td>Name</td>
				<td>age</td>
				<td>city</td>
			</tr>
		</table>
	</div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script>

   $.ajax({
        url:'json-file-create.php',
		type: 'post',
		dataType:'JSON',
		success:function(data){
			$.each(data, function(key, value){
             $("#show").append("<tr><td>"  +value.id+ "</td><td>" +value.name+ "</td><td>" +value.age+ "</td><td>" +value.city+ "</td></tr>" );
			});
			console.log(data);
		}
   });


   //json data get
      $.getJSON("daily-json-file.php",
	  function(data){
		$.each(data, function(key, value){
             $("#show").append("<tr><td>"  +value.id+ "</td><td>" +value.name+ "</td><td>" +value.age+ "</td><td>" +valuecity+ "</td></tr>" );
			});
			console.log(data);
	  }
	  );
</script>







</body>
</html>