<?php include 'core/init.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/welcome_nav.php';?>
<?php
//selecting the data from the doctors table
$sql="SELECT * FROM tbl_doctors ORDER BY RAND()";
$result=mysqli_query($conn,$sql);
?>

<section class="doctor-section">
	<div class="doctor-list">
		<div class="container"><h2>DOCTORS LIST</h2></div>
	</div>
	<div class="container">
		<div class="row">
			<?php while($row=mysqli_fetch_assoc($result)):?>
			<div class="col-md-6 page-header">
				<div class="row">
					<div class="col-md-4">
						<div class="doc-img">
							<img src="images/<?=$row['d_photo'];?>"/ class="img-thumbnail img-responsive" width="100%" height="100%">
						</div>
					</div>
					<div class="col-md-8">
						<div style="width:100%height:100%;padding-left:10px;">
							<h4><?=$row['d_name'];?></h4>
							<?php
							$id=$row['d_id'];
							$qry=mysqli_query($conn,"SELECT * FROM tbl_departments WHERE dep_id='$id'");
							$fet_qry=mysqli_fetch_assoc($qry);	
							?>
							<h5><?=$fet_qry['dep_name'];;?></h5>
							<button class="btn btn-default btn-sm" onclick="doc_profile(<?=$row['d_id'];?>)">view profile</button>
						</div>
					</div>
				</div>
			</div>
			
			<?php endwhile;?>
		</div>
	</div>
</section>
<?php include 'includes/footer.php';?>
	