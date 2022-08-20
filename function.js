$(document).ready(function(){
  $('#submit').click(function(){
	var email = $('#email').val();
	var pass = $('#pass').val();

	if(email.lenght =='' || pass.length  ==''){
		$('#message').html('fill out this filed first').fadeIn();
		$('#message').addClass('error');
		return false;
	}else{
		$.ajax({
			type: "POST",
			url: 'redirect.php',
			data: {email:email, pass:pass},
			success:function(response){
               $('#text').html(response);
			}

		});
	}
  });
   
  $('#m_e_t').hide();
  $('#p_e_t').hide();

  var email_error =false;
  var pass_error = false;

  $('#email').focusout(function(){
	check_email();
  });
  $('#pass').focusout(function(){
	check_pass();
  });


  function check_email() {
    $('#message').hide();
    var pattern = new RegExp(/^([a-zA-Z0–9_\.\-])+\@(([a-zA-Z0–9\-])+\.)+([a-zA-Z0–9]{2,4})+$/);
    if (pattern.test($('#email').val())) {
        $('#m_e_t').hide();
    } else {
        $('#m_e_t').html('Invalid email address');
        $('#m_e_t').show().addClass('error');
        error_email = true;
    }
}

function check_pass(){
	$('#message').hide();
	 var pass_length = $('#pass').val().length;
	 if(pass_length >8){

		$('#p_e_t').html('password must be 8 character');
		$('#p_e_t').show().addClass('error');
		pass_error = true;
	 }else{
		$('#p_e_t').hide();
	 }
}

});