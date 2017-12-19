<?php include '../core/init.php';?>
<?php include 'includes/header.php';?>
<?php if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="SELECT * FROM tbl_doctors WHERE d_id='$id'";
	$result=mysqli_query($conn,$sql);
	$value=mysqli_fetch_assoc($result);
	$Did=$value['d_id'];
	$h_qry=mysqli_query($conn,"SELECT * FROM tbl_hospitals WHERE h_id='$Did'");
	$fet_h_qry=mysqli_fetch_assoc($h_qry);

	$d_qry=mysqli_query($conn,"SELECT * FROM tbl_departments WHERE dep_id='$Did'");
	$fet_d_qry=mysqli_fetch_assoc($d_qry);
?>

<div class="container">
<h1 class="text-center">Edit doctor information</h1>
	<form action="update.php" method="POST">
	  <div class="form-group">
	  <input type="hidden" name="id" value="<?=$id;?>">
	  <label for="name">Name</label>
	    <input type="text" class="form-control" id="name" name="name"  value="<?=$value['d_name'];?>">
	  </div>

	  <div class="form-group">
	  <label for="address">Address</label>
	    <input type="text" class="form-control" id="address" name="address"  value="<?=$value['d_address'];?>">
	  </div>
	  <div class="form-group">
	  <label for="email">Phone</label>
	    <input type="text" class="form-control" id="email" name="phone"  value="<?=$value['d_phone'];?>">
	  </div>
	  <div class="form-group">
	  <label for="email">Email</label>
	    <input type="text" class="form-control" id="email" name="email"  value="<?=$value['d_email'];?>">
	  </div>

	 	<div class="form-group">
	  <label for="photo">Photo</label>
	    <input type="text" class="form-control" id="photo" name="photo"  value="<?=$value['d_photo'];?>">
	  </div>

	   <div class="form-group">
	  <label for="hospital">Hospital</label>
	  <?php 
	  	$sql=mysqli_query($conn,"SELECT * FROM tbl_hospitals");;
	  ?>
	    <select class="form-control" id="hospital" name="hospital">
	     <option value="<?=$fet_h_qry['h_id'];?>"><?=$fet_h_qry['h_name'];?></option>
	    <?php while($fet_row=mysqli_fetch_assoc($sql)):?>
	    <option value="<?=$fet_row['h_id'];?>"><?=$fet_row['h_name'];?></option>
	<?php endwhile;?>
	    </select>
	  </div>

	  <div class="form-group">
	  <label for="department">Dpartment</label>
	    <?php 
	  	$sql=mysqli_query($conn,"SELECT * FROM tbl_departments");;
	  ?>
	    <select class="form-control" id="department" name="department">
	     <option value="<?=$fet_d_qry['dep_id'];?>"><?=$fet_d_qry['dep_name'];?></option>
	    <?php while($fet_row=mysqli_fetch_assoc($sql)):?>
	    <option value="<?=$fet_row['dep_id'];?>"><?=$fet_row['dep_name'];?></option>
	<?php endwhile;?>
	    </select>
	  </div>
	  <div class="form-group">
	  <label for="Qualification">Qualification</label>
	    <input type="text" class="form-control" id="Qualification" name="qualification"  value="<?=$value['qualification'];?>">
	  </div>

	  <div class="form-group">
	  <label for="exprience">Exprience</label>
	    <input type="text" class="form-control" id="exprience" name="exprience"  value="<?=$value['experience'];?>">
	  </div>

	  <div class="form-group">
	  <label for="modified_date">Modified_date</label>
	    <input type="date" class="form-control" id="modified_date" name="modified_date" value="<?=$value['modified_date'];?>">
	  </div>

	  <button type="submit" class="btn btn-success" name="update">Update</button>
	   <button type="button" class="btn btn-danger"><a href="view_doctors.php">Cancel</a></button>
	</form>
</div>
<?php }else{
	echo"page not found";
	}
?>