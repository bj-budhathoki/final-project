<?php include 'core/init.php';?>
<?php include 'includes/header.php';?>
<div class="container">
	<?php
	if(isset($_GET['id']))
	{
        echo$year=$_GET['year'];
       echo $email=$_GET['name'];
      echo $id=$_GET['id'];
      echo$month=$_GET['month'];
       echo$day=$_GET['day'];
       $week_name=$_GET['week_name'];
      echo $book_time=$_GET['book_time'];
      echo$hospital=$_GET['hospital'];
       echo $doctor=$_GET['doctor'];
        $delete_qry=mysqli_query($conn,"DELETE  FROM tbl_appointment WHERE p_email='$email' AND p_id='$id'");
        if($delete_qry){
            mysqli_query($conn,"UPDATE tbl_working_day SET status='available' WHERE year='$year' AND month='$month' AND day='$day' AND week_name='$week_name',AND priority='$book_time'");
            echo "success";
        }else{
            echo $delete_qry."<br/>".mysqli_error($conn);
        }
	}
	?>
</div>