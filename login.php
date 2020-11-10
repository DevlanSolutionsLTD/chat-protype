<?php
include('header.php');
session_start();
include('config.php');
if (isset($_POST['user_login'])) {
  $user_email = $_POST['user_email'];
  $user_password = sha1(md5($_POST['user_password']));
  $stmt = $conn->prepare("SELECT user_email, user_phone, user_password, user_id FROM user WHERE ( user_email =? || user_phone =? ) and user_password =? ");
  $stmt->bind_param('sss', $user_email, $user_email, $user_password);
  $stmt->execute();
  $stmt->bind_result($user_email, $user_email, $user_password, $user_id);
  $rs = $stmt->fetch();
  $_SESSION['user_id'] = $user_id;
  if ($rs) {
    header("location:index.php");
  } else {
    $err = "Access Denied Please Check Your Credentials";
  }
}
?>
<title>WCF Chat protype</title>
<?php include('container.php');?>
<div class="container">		

	<div class="row">
		<div class="col-sm-4">
			<h4>Chat Login:</h4>		
			<form method="post">
				<div class="form-group">
				
					<div class="alert alert-warning"></div>
			
				</div>
				<div class="form-group">
					<label for="username">Email:</label>
					<input type="email" class="form-control" name="user_email" required>
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" name="user_password" required>
				</div>  
				<button type="submit" name="user_login" class="btn btn-info">Login</button>
			</form>
			<br>
			
		</div>
		
	</div>
</div>	
<?php include('footer.php');?>






