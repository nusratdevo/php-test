 <?php
 
 include 'Session.php';
  Session::checkLogin();
  ?>

  <h2>user Login</h2>
  <p id='text' ></p>
  <p id='message'></p>

  <form action="redirect.php" method="POST">

   <table>
	<tr>
		<input type="email" id="email" name="email" placeholder="Enter Your Email">
		<span><p id='m_e_t'></p></span>
	</tr>
	<tr>
		<input type="password" id="pass" name="pass" placeholder="pass enter">
		<span><p id="p_e_t"></p></span>
	</tr>
	<tr>
		<input type="submit" id="submit" value="submit" style="margin-top:5px">
	</tr>
   </table>

  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script> <script src=”function.js”></script>
<style type="text/css"> .error{ color:red; font-size: 20px; } </style>
