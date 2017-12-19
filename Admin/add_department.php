<?php include '../core/init.php';
include 'includes/header.php';
include 'includes/main-nav.php';
include 'includes/sidebar.php';

$sql=mysqli_query($conn,"SELECT * FROM tbl_hospitals");
?>
<br/><br/><br/>
<section id="main-content">
<div class="container">
<h1 class="text-center page-header">Add New Department</h1>
	<form method="POST">
		<div class="form-group">
			<label for="name">hospital</label>
			<select name="hospital_id" class="form-control">
			<?php while($row=mysqli_fetch_assoc($sql)):?>
				<option value="<?php echo$row['h_id'];?>"><?php echo$row['h_name'];?></option>
			<?php endwhile;?>
			</select>
		</div>
		<div class="form-group">
			<label for="name"> Department name</label>
			<input type="text" class="form-control" name="name" id="name">
		</div>
		<input type="submit" name="add_department" value="Add" class="btn btn-primary" />
	</form>
</div>
<?php
if(isset($_POST['add_department']))
{
	$hospital_id=$_POST['hospital_id'];
	$name=$_POST['name'];
	$sql="INSERT INTO tbl_departments(dep_name,h_id) VALUES('$name','$hospital_id')";
	if(mysqli_query($conn,$sql)){
	 	echo "one record insert succefully";
	 }else{
		echo"error:".$sql."<br/>".mysqli_error($conn);
	 }
}


?>
</section>
<?php include 'includes/footer.php';?>