<?php include 'core/init.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/welcome_nav.php';?>
<style type="text/css">
	/*===for appointment*/
	.appointment-form .form-control{
		width:100%;
		border-radius:0px;
	}
	.appointment-section{
			/*background-image:url(images/bg.png);*/
			margin-top:90px;
		}
</style>
<?php

$sql="SELECT* FROM tbl_hospitals";
$sql_result=mysqli_query($conn,$sql);

?>
<section class="appointment-section">
	<h4 class="text-center"><u>MAKE AN APPOINTMENT</u></h4>

	<div class="row">
	<?php
		if(isset($_GET['doc_id']))
		{ 
			$doc_id=$_GET['doc_id'];
		$sql="SELECT* FROM tbl_hospitals WHERE doc_id='$doc_id'";
	$sql_result=mysqli_query($conn,$sql);
			
	?>
	<div class="container">
		<form method="POST" action="appointment-process.php">
			<div class="row">
				<div class="col-md-4">
					<?php
					$qry_doc=mysqli_query($conn,"SELECT * FROM tbl_doctors WHERE d_id='$doc_id'");
					$doc=mysqli_fetch_assoc($qry_doc);
					?>
					<img src="images/<?=$doc['d_photo'];?>" class="img-thumbnail img-responsive" width="300px" height="100px;">
					
				</div>
				<div class="col-md-8">
				  <div class="row">
				  	<div class="col-md-6">
				  		<div class="form-group">
				  			<label for="doctor">doctor*</label>
					 		<input type="text" name="doctor" value="<?=$doc['d_name'];?>" class="form-control" readonly>
				  		</div>
				  	</div>
				  	<div class="col-md-6">
						<div class="form-group">
							<label for="hospital">Hospitals*</label>
					    	<select class="form-control" name="hospital" id="hospital" >
					    	  <option value="<?=((isset($_POST['hospital'])&& $_POST['hospital']=='')?'selected':'');?>">Select Hospital</option>
					    	  <?php while($row=mysqli_fetch_assoc($sql_result)):?>
					    	  <option value="<?=$row['doc_id'];?>"><?=$row['h_name'];?></option>
					    	  <?php endwhile;?>
					    	</select>
				  		</div>
					</div>
				  </div>
				 <div class="row">
				<div class="col-md-6">
					<div class="form-group">
					   <label for="fullName">Full Name*</label>
					    <input type="text" class="form-control" id="fullName" name="fullName" required >
				  	</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					  <label for="email">Email*:</label>
					    <input type="email" class="form-control" id="email" name="email"  required>
				  	</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					   <label for="address">Address*</label>
					    <input type="text" class="form-control" id="assress" name="address" required >
				  	</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					   <label for="contact">Contact:</label>
					    <input type="text" class="form-control" id="contact" name="contact"  required>
				  	</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="gender">Gender*</label>
						 <select class="form-control" name="gender" id="sex" required > required
						   <option>Select gender</option>
						    <option value="male">Male</option>
						    <option value="female">Female</option>
						   <option value="other">other</option>
						 </select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					<label for="age"> Age*</label>
					  <input type="text" name="age" class="form-control" required >
				  	</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<label for="arrival_time">date</label>
					<input type="date" name="date" id="date"  class="form-control" required>
				</div>
				<div class="col-md-4">
					<label for="arrival_time">Arrival Time</label>
					<input type="text" name="arrival_time" id="arrival_time"  class="form-control"  placeholder="10-10-AM/PM" required>
				</div>
				<div class="col-md-4">
					<label for="deadline">Deadline</label>
					<input type="text " name="deadline" id="deadline"  class="form-control" placeholder="10-10-AM/PM" required>
				</div>
			</div>
			
			<div class="row">
				<h5 class="text-center">Case Summary*</h5>
					<textarea class="form-control" rows="5" name="message"></textarea>
			</div><br/>
	       		 <button type="submit" name="book" class="btn btn-primary btn-lg" style="border-radius: 0px; border:1px solid black" id="book">BOOK AN APPOINTMENT</button>
				</div>
	        </div>
	   </form>
	</div>
	<br/>
	<?php }else{

	?>
  <div class="container">
	<div class="row">
		<form method="POST" action="appointment-process.php">
		<div class="col-md-12 ">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="hospital">Hospitals*</label>
					    	<select class="form-control" name="hospital" id="hospital"  required>
					    	  <option value="<?=((isset($_POST['hospital'])&& $_POST['hospital']=='')?'selected':'');?>">Select Hospital</option>
					    	  <?php while($row=mysqli_fetch_assoc($sql_result)):?>
					    	  <option value="<?=$row['h_id'];?>"><?=$row['h_name'];?></option>
					    	  <?php endwhile;?>
					    	</select>
				  		</div>
				  	</div>
				  	<div class="col-md-6">
						<div class="form-group">
						 <label for="doctor">Doctors*</label>
					    	<select class="form-control" name="doctor" id="doctors" required >
					    	 <option>Select Doctor</option>
					    	</select>
				  		</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						   <label for="fullName">Full Name*</label>
						    <input type="text" class="form-control" id="fullName" name="fullName" required >
					  	</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="email">Email*:</label>
						    <input type="email" class="form-control" id="email" name="email"  required>
					  	</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						   <label for="address">Address*</label>
						    <input type="text" class="form-control" id="assress" name="address" required >
					  	</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						   <label for="contact">Contact:</label>
						    <input type="text" class="form-control" id="contact" name="contact"  required>
					  	</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="gender">Gender*</label>
							 <select class="form-control" name="gender" id="sex" required > required
							   <option>Select gender</option>
							    <option value="male">Male</option>
							    <option value="female">Female</option>
							   <option value="other">other</option>
							 </select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<label for="age"> Age*</label>
						  <input type="text" name="age" class="form-control" required >
					  	</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label for="arrival_time">date</label>
						<input type="date" name="date" id="date"  class="form-control" required>
					</div>
					<div class="col-md-4">
						<label for="arrival_time">Arrival Time</label>
						<input type="text" name="arrival_time" id="arrival_time"  class="form-control"  placeholder="10-10-AM/PM" required>
					</div>
					<div class="col-md-4">
						<label for="deadline">Deadline</label>
						<input type="text " name="deadline" id="deadline"  class="form-control" placeholder="10-10-AM/PM" required>
					</div>
				</div>
				
				<div class="row">
					<h5 class="text-center">Case Summary*</h5>
						<textarea class="form-control" rows="5" name="message"></textarea>
				</div><br/>
				<div class="text-center">
				<button type="submit" name="book" class="btn btn-primary btn-lg" style="border-radius: 0px;" id="book">BOOK AN APPOINTMENT</button>
				</div>
		</div>
		</form>	
	</div>
</div>
</section>
<?php } 
 include 'includes/footer.php';
 ?>


