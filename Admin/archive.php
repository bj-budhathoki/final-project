<?php 
include '../core/init.php';
 include 'includes/header.php';
include 'includes/main-nav.php';
include 'includes/sidebar.php';
	$sql="SELECT * FROM tbl_doctors WHERE status=0";
	$result=mysqli_query($conn,$sql);
?>
<br/><br/><br/>
<section id="main-content">
<div class="container-fluid">
<h2 class="text-center">DOCTOR LIST</h2>
	<table class="table table-striped table-hover table-bordered table-condensed">
		<thead>
			<th></th>
			<th>ID</th>
			<th>D_NAME</th>
			<th>D_ADDRESS</th>
			<th>D_PHONE</thd
			<th>D_EMAIL</th>
			<th>D_PHOTO</th>
			<th>D_SPECIALIST</th>
			<th>D_QUALIFICATION</th>
			<th>D_EXPERIENCE</th>
			<th>ADDED_DATE</th>
			<th>DELETED_DATE</th>
				
		</thead>
		<tbody>
		<?php while($row=mysqli_fetch_assoc($result)):?>
			<tr>
				<td><a href="archive.php?id=<?=$row['d_id'];?>"><i class="fa fa-refresh btn btn-sm btn-default" aria-hidden="true"></i></a></td>
				<td><?=$row['d_id'];?></td>
				<td><?=$row['d_name'];?></td>
				<td><?=$row['d_address'];?></td>
				<td><?=$row['d_phone'];?></td>
				<td><?=$row['d_email'];?></td>
				<td><?=$row['d_photo'];?></td>
				<td><?=$row['specialist'];?></td>
				<td><?=$row['qualification'];?></td>
				<td><?=$row['experience'];?></td>
				<td><?=$row['added_date'];?></td>
				<td></td>
				
			</tr>
		<?php endwhile;?>
		</tbody>
	</table>
</div>
<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="UPDATE tbl_doctors set status=1 WHERE d_id='$id'";
if(mysqli_query($conn,$sql)){
	echo"one record refreshed successfully !";
	 header( "refresh:2;url=view_doctors.php" ); 
}else{
	echo"error".$sql."<br/>".mysqli_error();
}

}

?>
</section>
<?php include 'includes/footer.php';?>