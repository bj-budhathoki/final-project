<?php
include 'core/init.php';
$hospitalID=$_GET['hospitalID'];
$doc_id=$_GET['doctorID'];
$year=$_GET['year'];
$month=$_GET['month'];
$day=$_GET['day'];
$week_name=$_GET['week_name'];
//selecting hospital
$hospital=mysqli_query($conn,"SELECT * FROM tbl_hospitals WHERE h_id='$hospitalID'");
$fetch_hos=mysqli_fetch_assoc($hospital);
//selecting the doctor 
$doc_sql="SELECT * FROM tbl_doctors WHERE d_id='$doc_id'";
$doc_res=mysqli_query($conn,$doc_sql);
$row=mysqli_fetch_assoc($doc_res);
?>
<p class="text-center"><?php echo$row['d_name'];?></p>
<img src="images/<?php echo$row['d_photo'];?>" class="img-responsive img-thumbnail">
<p class="text-center"><?=$row['d_profession'];?></p>
<b>Already Booked time</b><br/>

<?php
$time_sql="SELECT * FROM tbl_working_day WHERE year='$year' AND month='$month' AND day='$day' AND week_name='$week_name' AND h_id='$hospitalID' AND doc_id='$doc_id' AND emergency_case='booked'";
$time_res=mysqli_query($conn,$time_sql);
$count=mysqli_num_rows($time_res);
if($count> 0){
	echo"emergency case for Dr.".$row['d_name']." at hospital".$fetch_hos['h_name']." is already booked by another user.please try noraml time and date!!!";
}else{?>
	<div class="form-group">
		<h5>if you have an emergency please check the following box</h5>
		<font color="red">emergency case &nbsp; &nbsp;</font><br/>
		<input type="checkbox" style="width:50px; height:40px;" name="emergency" id="emergency" value="emergency">
		</div>
<?php }
?>

<script>
	$(document).ready(function(){
		$('#doc_time').click(function(){
			$('#doc_time').css('background','red');
		});
	});
</script>
 