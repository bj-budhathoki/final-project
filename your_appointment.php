<?php include 'core/init.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/welcome_nav.php';?>
<br/><br/>
<?php
if(isset($_GET['email']) && isset($_GET['id']))
{
	$email=$_GET['email'];
	$id=$_GET['id'];
	$sql=mysqli_query($conn,"SELECT * FROM tbl_appointment WHERE p_email='$email'");
	if($sql){?>
	<div class="container" style="min-height:600px; margin-top:90px;">
		<h1 class="text-center" style="margin-bottom:30px;"><u>Your Appointment</u></h1>
		<table class="table table-hover table_responsive">
		<thead>
			<th></th>
			<th>Id</th>
			<th>Doctor</th>
			<th>Hospital</th>
			<th>Appointment Date</th>	
			<th>Appointment Time</th> 
			<th>status</th> 
			<th></th>	
		</thead>
		<tbody>
			<?php while($row=mysqli_fetch_assoc($sql)):
				$h_id=$row['hospital_id'];
				$doc_id=$row['doctor_id'];
			?>
				<tr>
				<td><button class="bnt btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></td>
					<td><?php echo$row['p_id'];?></td>
					<td>
						<?php
							$sel_doc=mysqli_query($conn,"SELECT * FROM tbl_doctors WHERE d_id='$doc_id'");
							$result=mysqli_fetch_assoc($sel_doc);
							echo $result['d_name'];
						 ?>
					</td>
					<?php 
					/*selecting hospital names from the data base adccoring to hospitals id in tbl_appointment*/
						$h_sql="SELECT * FROM tbl_hospitals WHERE h_id='$h_id'";
						$h_res=mysqli_query($conn,$h_sql);
						//fetching data
						$h_row=mysqli_fetch_assoc($h_res);
					?>
					<td><?php echo$h_row['h_name'];?></td>
					<td>
						<?php
							echo $row['book_date'];
						;?>
					</td>
					<td><?=$row['arrival_time'];?>-<?=$row['deadline'];?></td>
					<td><?=$row['appointment_status'];?></td>
				<td><button class="bnt btn-danger btn-sm"><i class="fa fa-window-close" aria-hidden="true"></i><a href="cancel_appointment.php?id=<?=$row['p_id'];?>&name=<?=$row['p_email'];?>&year=<?=$row['book_year'];?>&month=<?=$row['book_month'];?>&day=<?=$row['book_day'];?>&week_name=<?=$row['week'];?>&book_time=<?=$row['book_time'];?>&hospital=<?=$row['hospital_id'];?>&doctor=<?=$row['doctor_id'];?>"> cancel</a></button></td>
				</tr>
			<?php endwhile;?>
		</tbody>
	</table>
</div>
	<?php }else{
		echo $sql ."<br/>".mysqli_error($conn);
	}
	
}
	
?>
<?php include 'includes/footer.php';?>