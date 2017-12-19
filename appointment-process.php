<?php
include 'core/init.php';
include 'function.php';
if(isset($_POST['book']))
{
	$hospital=$_POST['hospital'];
	$doctor=$_POST['doctor'];
	$fullName=$_POST['fullName'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$p_email=$_POST['email'];
    $gender=$_POST['gender'];
    $age =$_POST['age'];
    $date=$_POST['date'];
    $arrival_time=$_POST['arrival_time'];
    $deadline=$_POST['deadline'];
    $message=$_POST['message'];
   //  $select_sql=mysqli_query($conn,"SELECT * FROM tbl_appointment WHERE  arrival_time='$arrival_time' AND deadline='$deadline' AND book_date='$date' AND hospital_id='$hospital' AND doctor_id='$doctor'");
	  // $count=mysqli_num_rows($select_sql);
	  // if($count > 0){
	  // 	echo"this time is already booked abother patient.please try next one.";
	  // }else{
	  	$insert=mysqli_query($conn,"INSERT INTO  tbl_appointment(`p_name`,`p_address`,`p_contact`,`p_email`,`p_gender`,`p_age`,`arrival_time`,`deadline`,`book_date`,`hospital_id`,`doctor_id`,`p_message`) VALUES('$fullName','$address','$contact','$p_email','$gender','$age','$arrival_time','$deadline','$date','$hospital','$doctor','$message')");
	  	if($insert){
	  		echo "success";
	  		
	  	}else{
	  		echo "error".mysql_error();

	  	}
	  // }

	} 
?>