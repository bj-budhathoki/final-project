<?php session_start();?>
<?php include '../core/init.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/main-nav.php';?>
<?php include 'includes/sidebar.php';?>
<?php
if(isset($_SESSION['user'])){
	$h_id=$_SESSION['user']; 
}
$sql=mysqli_query($conn,"SELECT * FROM tbl_admin WHERE admin_id='$h_id'");
$row=mysqli_fetch_assoc($sql);
$username=$row['hospital'];

$sql="SELECT * FROM tbl_appointment WHERE hospital_id='$h_id'";
$result=mysqli_query($conn,$sql);
	
?>
<div class="container">
	<br/><br/><br/>
<h2 class="text-center"><u>Appointment for <?=$username;?></u> </h2>
	<table class="table table-striped table-hover table-bordered table-condensed" id="doc-table">
		<thead>
			<th>Patient ID</th>
			<th>Patient Name</th>
			<th>Patient Address</th>
			<th>Patient Phone</th>
			<th>Patient email</th>
			<th>Arrival time</th>
			<th>Deadline</th>
			<th>Book date</th>
			<th>Doctor</th>
			<th>Book At</th>
			<th>Appointment status</th>
			<th>opreation</th>
		</thead>
		<tbody>
		<?php while($row=mysqli_fetch_assoc($result)):?>
			<tr>
				<td><?=$row['p_id'];?></td>
				<td><?=$row['p_name'];?></td>
				<td><?=$row['p_address'];?></td>
				<td><?=$row['p_contact'];?></td>
				<td><?=$row['p_email'];?></td>
				<td><?=$row['arrival_time'];?></td>
				<td><?=$row['deadline'];?></td>
				<td><?=$row['book_date'];?></td>
				<td><?=$row['doctor_id'];?></td>
				<td><?=$row['booked_at'];?></td>
				<td><?=$row['appointment_status'];?></td>
				<td>
					<a href="accept.php?pid=<?=$row['p_id'];?> &&p_email=<?=$row['p_email'];?> &&p_name=<?=$row['p_name'];?> && hospital=<?=$username;?> ">Accept / </a>
					<a href="reject.php?pid=<?=$row['p_id'];?>&&p_email=<?=$row['p_email'];?>  &&p_name=<?=$row['p_name'];?> && hospital=<?=$username;?>">Reject</a>
				</td>
			</tr>
		<?php endwhile;?>
		</tbody>
	</table>
</div>

<?php include 'includes/footer.php';?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#doc-table').DataTable();
	});
</script>