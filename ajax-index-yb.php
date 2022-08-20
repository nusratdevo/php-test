<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajax Project with Php</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card mt-5">
					<div class="card-title ml-5 my-2">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Registration">Add New User</button>
					</div>
					<div class="card-body">
						<p id="delete-message"></p>
						<div id="table"></div>
					</div>
				</div>

			</div>
		</div>
	</div>

<!-- Registration modal -->

<div class="modal" id="Registration">
	<div class="modal-dialog">
		<div class="modal-content">
	<div class="modal-header">
		<h3>Registration form</h3>
	</div>
	<div class="modal-body">
		<p id="message"></p>
		<form>
			<input type="text" class="form-control" placeholder="User name" id="name">
			<input type="email" class="form-control" placeholder="User Email" id="email">
		</form>
		<div class="modal-footer">
			<button type="button" class="btn btn-success" id="register"> Registration</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
		</div>
	</div>
</div>
			
</div>
	</div>




<!--Update Modal-->
<div class="modal" id="update">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Update Form</h3>
          </div>
          <div class="modal-body">
          <p id="up-message" class="text-dark"></p>
            <form>
              <input type="hidden" class="form-control my-2" placeholder="User Email" id="up_id">
              <input type="text" class="form-control my-2" placeholder="User Name" id="up_name">
              <input type="email" class="form-control my-2" placeholder="User Email" id="up_email">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_update">Update Now</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>


	<!-- Delete Modal -->
       <div class="modal" id="delete">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Delete Record</h3>
				</div>
				<div class="modal-body">
					<p>DO you want to delete th record?</p>
					<button type="button" class="btn btn-success" id="btn_delete">Delete</button>
					<button type="button" class="btn btn-danger" id="close" data-dismiss="modal"></button>
				</div>
			</div>
		</div>
	   </div>


<script type="text/javascript">
   function Insert_record(){
	$(document).on('click', '#register', function(){
		var name = $('#name').val();
		var email = $('#email').val();

		if(user== '' || email==''){
			$('#message').html('PLease fill ALL the field');

		}else{
			$.ajax({
                    url:'ajax-yb-insert.php',
					method:'post',
					data:{u_name:name, u_email:email},
					success:function(data){
						$('#message').html('data');
						$('#registration').modal('show');
						$('form').trigger('reset');
						view_record();
					}
			});
		}
	});
	$(document).on('click','#close', function(){
		$('form').trigger('reset');
		$('#message').html('');
	})
   }

   function view_record(){

	$.ajax({
         url:'ajax.yb-view.php',
		 method:'post',
		 success:function(data){
			data=$.parseJSON(data);
			if(data.status==success){
				$('#table').html(data.html);
			}
		 }
	});
   }

   //get data by Id

    function get_record(){
		$(document).on('click', '#btn_edit', function(){
			var id =$(this).attr('data-id');
			$.ajax({
               url:'ajax-yb-getdata.php',
			   method:'post',
			   data:{user_id:id},
			   success:function(data){
				$('#up_id').val(data[0]);
				$('#up_name').val(data[1]);
				$('#up_email').val(data[2])
				$('#update').modal('show');
			   }
			});
		})
	}

	//update record

	function update_record(){
		$(document).on('click', '#btn_update', function(){
			var up_id= $('#up_id').val();
			var up_name=$('#up_name').val();
			var up_email=$('#up_email').val();
			 
			if(up_name =="" || up_email ==""){
				$('#up=message').html('please fill');
				$('#update').modal('show');
			}else{
				$.ajax({
					url:'ajax-yb-update.php',
					method:'post',
					data:{id:up_id, name:up_name, email:up_email},
					success:function(data){
                      $('#up-message').html(data);
					  $('#update').modal(show);
					  view_record();
					}

				});
			}


		});
	}

	//delete function

	function delete_record(){
		$(document).on('click', '#btn_delete', function(){
          var delete_id = $(this).attr('data-delete');

		  $('#delete').modal('show');
		  $(document).on('click','#btn_delete_record',function(){
			$.ajax({
                 url:'ajax-yb-delete.php',
				 method:'post',
				 data:{id:delete_id},
				 sunccess:function(data){
					$('#delete-message').html('data').hide(5000);
					view_record();
				 }
			});
		  })
});
	}
</script>

</body>
</html>