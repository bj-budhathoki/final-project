<?php session_start();?>
<?php include '../core/init.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/main-nav.php';?>
<?php include 'includes/sidebar.php';?>
<?php
if(isset($_SESSION['user'])){
	$admin_id=$_SESSION['user'];
}
	$sql="SELECT * FROM tbl_doctors WHERE h_id='$admin_id' ";
	$result=mysqli_query($conn,$sql);

?>
<div class="container">
<h2 class="text-center">DOCTOR LIST</h2>
	<table class="table table-striped table-hover table-bordered table-condensed" id="doc-table">
		<thead>
			<th colspan="2"></th>
			<th><?=$admin_id;?></th>
			<th>Name</th>
			<th>Address</th>
			<th>Photo</th>
			<th>E-mail</th>
			<th>Phone</th>
			<th>Hospital</th>
			<th>profession</th>
			<th>Experience</th>
			<th>Added-date</th>
			<th>Profile</th>
		</thead>
		<tbody>
		<?php while($row=mysqli_fetch_assoc($result)):?>
			<tr>
				<td><a href="edit.php?id=<?=$row['d_id'];?>"><i class="fa fa-pencil btn btn-xs btn-primary" aria-hidden="true"></i>Edit</a></td>
				<td><a href="delete.php?id=<?=$row['d_id'];?>"><i class="fa fa-trash-o btn btn-xs btn-danger" aria-hidden="true"></i>Delete</a></td>
				<td><?=$row['d_id'];?></td>
				<td><?=$row['d_name'];?></td>
				<td><?=$row['d_address'];?></td>
				<td><img src="../images/<?=$row['d_photo'];?>" style="width:80px;height:80px"></td>
				<td><?=$row['d_email'];?></td>
				<td><?=$row['d_phone'];?></td>
				<?php
				 $h_id=$row['h_id'];
				$qry=mysqli_query($conn,"SELECT * FROM  tbl_hospitals WHERE h_id='$h_id'");
				$fetch_row=mysqli_fetch_assoc($qry);
				?>
				<td><?=$fetch_row['h_name'];?></td>
				<td><?=$row['d_profession'];?></td>
				<td><?=$row['d_experience'];?></td>
				<td><?=$row['added_at'];?></td>
				<td><button class="btn btn-default btn-sm"  onclick="dmodel(<?=$row['d_id'];?>);"><i class="fa fa-eye" aria-hidden="true"></i></button></td>
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