<?php include 'core/init.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/welcome_nav.php';?>
<?php
//select the hospital from the database..
$sql="SELECT * FROM tbl_hospitals";
$res=mysqli_query($conn,$sql);

?>
<br/><br/>
<style type="text/css">
	.hospital-info{
		background:silver;
		width:100%;
		min-height:100px;
		padding:10px;
		color:blue;
	}
</style>
<section class="hostpital-section">
<div class="doctor-list">
	<div class="container"><h1 class="text-center page-header">HOSPITALS LIST OF NEPAL</h1></div>
</div>
<div class="container">
	<div class="row">
	<?php while($row=mysqli_fetch_assoc($res)):?>
		<div class="col-sm-4">
			<div class="hospital-img">
				<img src="images/hospitals/<?=$row['pic'];?>" alt="<?=$row['h_name'];?>" class="img-responsive img-thumbnail" width="100%"/>
			</div>
			<div class="hospital-info">
				<h4><?=$row['h_name'];?></h4>
				<p>Address: <?=$row['h_address'];?></p>
				<p>Phone: <?=$row['phone'];?></p>
			</div>
		</div>
	<?php endwhile;?>
	</div>
</div>
</section>
