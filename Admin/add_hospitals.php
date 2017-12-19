<?php include '../core/init.php';
 include 'includes/header.php';
include 'includes/main-nav.php';
include 'includes/sidebar.php';
$sel_doc=mysqli_query($conn,"SELECT * FROM tbl_doctors");
?>
<br/><br/><br/>
<section id="main-content">
<div class="container">
	<h1 class="text-center page-header">Add New Hospital</h1>
	<form method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="name">Name*</label>
				<input type="text" class="form-control" name="name" id="name">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" class="form-control" name="address" id="location">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				<label for="phone">Phone</label>
				<input type="text" class="form-control" name="phone" id="phone">
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label for="doctors">doctors</label>
				<select class="form-control" name="doctors" id="doctors">
					<option value="0">select hospital</option>
					<?php while($fet=mysqli_fetch_assoc($sel_doc)):?>
						<option value="<?=$fet['d_id'];?>"><?=$fet['d_name'];?></option>
					<?php endwhile; ?>
				</select>
				
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label for="picture">picture</label>
				<input type="file" class="form-control" name="picture" id="picture">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<label for="about">About hospital</label>
			<textarea class="form-control" rows="5" name="about">
				
			</textarea>
		</div>
	</div>
	<br/>
		<input type="submit" name="add_hospitals" value="Add Hospital" class="btn btn-primary btn-lg" />
	</form>
</div>
<?php
if(isset($_POST['add_hospitals']))
{
	$h_name=$_POST['name'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$about=$_POST['about'];
	$doctors=$_POST['doctors'];
	if($_FILES)
	{
		 	$errors= array();
			$photo=$_FILES['picture'];
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
			$uploadPath='../images/hospitals/'.$uploadName;
			$dbpath=$uploadName;
			if($mineType != 'image')
			{
				$errors[].="the file must be images";

			}
			if(!in_array($fileExt, $allowed))
			{
				$errors[].="file extention must be in png,jpg, gif,jpeg";
			}
			if($filesize> 250000)
			{
				$errors[].="file must be under 25mb.";
			}
			if(!empty($errors))
			{
				echo"something wrong";
				
			}else{
				move_uploaded_file($tempLoc,$uploadPath);
				$sql="INSERT INTO tbl_hospitals(h_name,h_address,phone,pic,about,doc_id) VALUES('$h_name','$address','$phone','$dbpath','$about','$doctors')";
				if(mysqli_query($conn,$sql)){
					echo "one record insert succefully";
				}else{
					echo"error:".$sql."<br/>".mysqli_error($conn);
				}
			}
	}
	
}
?>
</section>
<?php include 'includes/footer.php';?>
