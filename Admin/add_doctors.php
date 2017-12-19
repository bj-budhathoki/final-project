<?php session_start();?>
<?php include '../core/init.php';
 include 'includes/header.php';
include 'includes/main-nav.php';
include 'includes/sidebar.php';
if(isset($_SESSION['user'])){
	echo $admin_id=$_SESSION['user'];
}
$sql=mysqli_query($conn,"SELECT * FROM tbl_hospitals WHERE h_id='$admin_id'");
$selected_hos=mysqli_fetch_array($sql);
echo $selected_hos['h_name'];
$slq_dep=mysqli_query($conn,"SELECT * FROM tbl_departments");
?>
<br/><br/><br/>
<section id="main-content">
<div class="container">
<h1 class="text-center page-header">Add New Doctor</h1>
	<form action="" method="POST" enctype="multipart/form-data">
	<div class="row">
		  <div class="form-group col-md-4">
		  <label for="D_name">Doctor Name*</label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="doctor's name" required>
		  </div>

		  <div class="form-group col-md-4">
		  <label for="D_name">Doctor Address*</label>
		    <input type="text" class="form-control" id="address" name="address" placeholder="doctor address" required>
		  </div>
			<div class="form-group col-md-4">
		  <label for="D_name">phone*</label>
		    <input type="text" class="form-control" id="phone" name="phone" placeholder="doctor phone" required>
		  </div>
			
	 </div>
	 <div class="row">
	 	<div class="form-group col-md-4">
		  <label for="D_name">Email*</label>
		    <input type="text" class="form-control" id="email" name="email" placeholder="doctor email" required>
		  </div>
		 <div class="form-group col-md-4">
		  <label for="photo">photo*</label>
		    <input type="file" class="form-control" id="photo" name="photo" placeholder="doctor_photo" required>
		  </div>

		  <div class="form-group col-md-4">
		  <label for="profession">Profession*</label>
		    <input type="text" class="form-control" id="profession" name="profession" placeholder="doctor profession" required>
		  </div>
		  
	 </div>
	 <div class="row">
		  <div class="form-group col-md-4">
		  <label for="experience">Education*</label>
		    <input type="text" class="form-control" id="experience" name="experience" placeholder="doctor experience" required>
		  </div>

		  <div class="form-group col-md-4">
		  <label for="hospital">hospital</label>
		    <input type="text" name="hospital" value="<?=$selected_hos['h_id'] ;?>" class="form-control" readonly>
		  </div>
	 </div>
	 <div class="row">
	 	<label>About Doctor</label>
	 	<textarea name="about_doc" class="form-control"></textarea>
	 </div>
	 <br/>
	  <button type="submit" class="btn btn-success" name="ADD DOC">ADD DOC</button>
	</form>
	<br/>
</div>
<?php
if($_POST)
{
	$d_name=$_POST['name'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$profession=$_POST['profession'];
	$experience=$_POST['experience'];
	$hospital_id=$_POST['hospital'];
	$about=$_POST['about_doc'];	 
	if($_FILES)
		{
			 $errors= array();
			$photo=$_FILES['photo'];
			$name=$photo['name'];
			$nameArray=explode('.',$name);
			$fileName=$nameArray[0];
			$fileExt=$nameArray[1];
			$mine=explode('/',$photo['type']);
			$mineType=$mine[0];
			$mineExt=$mine[1];
			$filesize=$photo['size'];
			$tempLoc=$photo['tmp_name'];
			$allowed=Array('png','jpg','jpeg','gif');
			$uploadName=md5(microtime()).'.'.$fileExt;
			$uploadPath='../images/'.$uploadName;
			$dbpath=$uploadName;
			if($mineType != 'image')
			{
				$errors[].="the file must be images";

			}
	 		if(!in_array($fileExt, $allowed))
	 		{
	 			$errors[].="file extention must be in png,jpg, gif,jpeg";
	 		}
	 		
	 		if(!empty($errors)){
				echo"something wrong";
				
			}else{
			move_uploaded_file($tempLoc, $uploadPath);
	 			//inserting the form data inno database
 	  	$sql="INSERT INTO tbl_doctors(d_name,d_address,d_phone,d_email,d_photo,d_profession,d_experience,about_doctor,h_id) VALUES('$d_name','$address','$phone','$email','$dbpath','$profession','$experience','$about','$hospital_id')";

	 	 if($result=mysqli_query($conn,$sql)){
	 	 	$url="view_doctors.php";
			if(headers_sent()){
				die('<script type="text/javascript">window.location.href="'.$url.'"</script>');
			}else{
				header('Location:$url');
				die();
			}
	 	 }else{
	 	 	echo"ERROR:".$sql."<br/>".mysqli_error($conn);
	  		}
	  }
	}

}

?>
</section>
<?php include 'includes/footer.php';?>