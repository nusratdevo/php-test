<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Php And Ajax crud</title>
</head>
<body>
	<table id="main">
		<tr>
			<td id="header"> <h2>Header</h2>
		    <div id="search-bar">
				<label for=""> Search</label>
				<input type="text" names="search" id="search">
			</div>
		</td>
		</tr>
		<tr>
			<td id="table-form">
				<form id="addform">
					First name: <input type="text" id="fname">
					Last Name: <input type="text" id="lname">

					<input type="submit" id="submit" value="Save">
				</form>
			</td>
		</tr>
		<tr>
			<td id="table-data"></td>
		</tr>
	</table>

	<div id="error-message"></div>
	<div id="success-message"></div>

	<div id="modal">
		<div id="modal-form">
			<table></table>
			<div id="close-btn">X</div>
		</div>
	</div>

   <script type="text/javascript" src="js/jquery.js"></script>
   <script type="text/javascript">
   $(document).ready(function(){
      //load table

	  function loadTable(){
        $.ajax({
			url:"ajax-load.php",
			type:"POST",
			success:function(data){
				$('#table-data').html(data);
			}
		});
	  }
	  loadTable(); //Load table data on page load

	  //Insert new record
	  $("#submit").on('click', function(e){
         e.preventDefault();
		 var fanme =$("#fname").val();
		 var lanme =$("#lname").val();

		 if(fname =="" || lname==""){
			$("#error-massage").html('Data should fill all').slideDown();
			$("#sucess-message").slideUp();
		 }else{
			$.ajax({
				url:"ajax-insert.php",
				type:"POST",
				data:{fname:fname, lname:lname};
				success:function(data){
                  if(data ==1){
                   $("#success-message").html("data inserted Successfully")slideDown();
                    $("#error-message").slideUp();
				  }
				}
			})
		 }
	  });

	  //show modal 
	  $(document).on('click', "#edit-btn", function(){
       $("#modal").show();
       var stuId = $(this).data('eid');
         $.ajax({
			url:"load-update.php",
			type:"POST",
			data:{id:stuId},
			success:function(data){
				$("#modal-form table").html(data);
			}

		 });
	  });

	  //Hide Modal
	  $("#clode-btn").on('click', function(){
        $("#modal").hide();
	  });

	  //Save update data
       $(document).on("click", "#edit-submit", function(){
         var stuId = $("#edit-btn").val();
		 var fname = $("#edit-fname").val();
		 var lname = $("#edit-laname").val();

		 $.ajax({
             url:"ajax-update-form.php",
			 type:"POST",
			 data:{id:stuId, fname:fname, lname:lname};
			 success:function(data){
				if(data ==1){
					$("#modal").hide();
					loadTable();

				}
			 }
		 });
	   });

     //Delete Record
	 $(documet)on("click",".delete-btn", function(){
       if(confirm("do you really delete this record?")){
		var stuId = $(this).data("id");
		var element = $(this);

		$.ajax({
        url:"ajax-delete.php",
       type:"POST",
	   data:{id:stuId},
	   success:function(data){
		if(data ==1){
			$(element).closest("tr").fadeOut();
		}else{
                $("#error-message").html("Can't Delete Record.").slideDown();
                $("#success-message").slideUp();}

	   }
		});
	   }
	 });
   //Live search
   $("#search").on("keyup",function(){
       var search_term = $(this).val();

       $.ajax({
         url: "ajax-live-search.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data").html(data);
         }
       });
     });




   });
   </script>
</body>
</html>