<?php session_start();?>
<?php
require_once 'core/init.php';
if(isset($_POST['signup']))
{
	$username=$_POST['username'];
	$address=$_POST['address'];
	// $phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql=mysqli_query($conn,"SELECT u_email, password FROM tbl_users WHERE u_email='$email'AND password='$password' ");
	if(mysqli_num_rows($sql)>0){
		echo"this email already exits.please try another one";
	}else{
		//echo $sql."<br/>".mysqli_error($conn);
		mysqli_query($conn,"INSERT INTO tbl_users(`u_name`,`u_address`,`u_email`,`password`) VALUES('$username','$address','$email','$password')");
		
		$_SESSION['user']=$username;
		//header("Location:welcome.php");
		echo"hello".$username." welcome here";
		header('refresh:2;url=index.php');
	}

}else{
	echo"somrthing wrong";
}


?>