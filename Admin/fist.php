<?php session_start();?>
<?php include '../core/init.php';?>
<?php include '/includes/header.php';?>
<div class="container">
	<form action="" method="POST">
	  <div class="form-group">
	    <input type="email" class="form-control" id="email" name="email" placeholder="Your Name">
	  </div>
	  <div class="form-group">
	    <input type="password" class="form-control" id="pwd" name="password" placeholder=" Your password">
	  </div>
	 
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
<!--
<?php
	if($_POST)

	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sel_sql="SELECT email,password FROM users WHERE email='$email' AND password='$password'";
		$result = mysqli_query($conn, $sel_sql);
		if($result){
			$_SESSION['name']=$email;
			header('location:welcome.php');
		}else{
			echo "Error: " . $sel_sql . "<br>" . mysqli_error($conn);
		}
	}

?>
-->
<?php include '/includes/footer.php';?>