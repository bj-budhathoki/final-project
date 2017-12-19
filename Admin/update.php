<?php
include '../core/init.php';
if(isset($_POST['update'])){
	  $id=$_POST['id'];
	  $D_name=$_POST['name'];
	  $D_address=$_POST['address'];
	  $D_photo=$_POST['photo'];
	  $D_email=$_POST['email'];
	  $D_phone=$_POST['phone'];
	   $hospital=$_POST['hospital'];
	  $department=$_POST['department'];
	  $D_qualification=$_POST['qualification'];
	  $D_experience=$_POST['exprience'];
	  $D_modified_date=$_POST['modified_date'];
	 //$D_status=$_POST['status'];
	  $sql="UPDATE Doctors SET D_Name='$D_name',D_Address='$D_address',D_Photo='$D_photo',D_Email='$D_email',D_Phone='$D_phone',H_id='$hospital',Dep_id='$department',D_Qualification='$D_qualification',D_Experience='$D_experience',D_modified_date='$D_modified_date' WHERE D_Id='$id'";
	  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
   // header( "refresh:2;url=view_doctors.php" );
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
