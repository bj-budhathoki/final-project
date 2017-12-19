<?php require_once 'core/init.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/welcome_nav.php';?>
<?php
$sql="SELECT * FROM tbl_blood_donators";
$res=mysqli_query($conn,$sql);
?>
<section class="doctor-section" style="min-height:650px;">
	<div class="doctor-list">
		<div class="container">
			<h2 class="text-center">LIST OF BLOOD DONATORS</h2>
			<p class="text-center"><font color="red">DONATE THE BLOOD SAVE THE LIFES</font></p>
		</div>
	</div>
		<div class="container">
			<div class="row" style="border-bottom:3px solid gray">
				<button class="btn btn-primary" data-toggle="modal" data-target="#donate_blood">DONATE BLOOD NOW</button>
			</div>
			<div class="row">
				<?php while($row=mysqli_fetch_assoc($res)):?>
				<div class="col-md-4" style="padding:5px; border-bottom:2px solid white">
					<div class="row">
						<div class="col-md-4">
							<div class="doc-img"">
								<img src="images/donators/<?=$row['photo'];?>" class="img-thumbnail" width="100%">
							</div>
						</div>
						<div class="col-md-8">
							<div class="text" style="color:black; padding-top:3px;">
								<h4><?=$row['name'];?></h4>
								<b><?=$row['phone'];?></b><br/>
								<small><?=$row['address'];?></small>
								<hr/>
								<button class="btn btn-info btn-sm">contact</button>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile;?>
			</div>
		</div>
	</div>
</section>
<?php include 'includes/footer.php';?>
<!--modal-->
<div class="modal fade" id="donate_blood" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">DONATE BLOOD</h4>
	      </div>
	      <form method="POST" action="donate-process.php" enctype="multipart/form-data">
	      	<div class="modal-body">
		        	<div class="form-group">
		        		<label for="name">name*</label>
		        		<input type="text" name="name" class="form-control">
		        	</div>
		        	<div class="form-group">
		        		<label for="address">Addres*</label>
		        		<input type="text" name="address" class="form-control">
		        	</div>
		        	<div class="form-group">
		        		<label for="phone">Phone*</label>
		        		<input type="text" name="phone" class="form-control">
		        	</div>
		        	<div class="form-group">
		        		<label for="photo">photo*</label>
		        		<input type="file" name="photo" class="form-control">
		        	</div>
		        	<div class="form-group">
		        		<label for="email">Email*</label>
		        		<input type="text" name="email" class="form-control">
		        	</div>
		    </div>
		      <div class="modal-footer">
		      	<button type="submit" class="btn btn-success btn-ld pull-left" name="donate">DONATE</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="closeModal();">Close</button>
		      </div>
		  </form>
		</div>
</div>

<script>
    function closeModal() {
        jQuery('#donate_blood').modal('hide');
        location.reload('blood-doners-list.php');
    }
</script>
