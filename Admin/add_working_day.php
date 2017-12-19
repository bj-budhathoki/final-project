<?php include '../core/init.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/main-nav.php';?>
<?php include 'includes/sidebar.php';?>
<?php
//selecting the hospitals for the tbl_hospitals 
$sel_hospitals_sql="SELECT * FROM tbl_hospitals";
$sel_hospitals_res=mysqli_query($conn,$sel_hospitals_sql);
$sel_doctors_sql=mysqli_query($conn,"SELECT * FROM tbl_doctors");
?>
<br/><br/><br/><br/>
<section id="main-content">
<div class="container">
<h2 class="page-header text-center"> ADD DOCTORS WORKING schedule</h2>
<form method="POST" action="">
	<div class="form-group">
		<label for="hospital">Hospitals*</label>
		<select class="form-control" name="hospital" id="hospital" >
		<option value="<?=((isset($_POST['hospital'])&& $_POST['hospital']=='')?'selected':'');?>">Select Hospital</option>
		<?php while($row=mysqli_fetch_assoc($sel_hospitals_res)):?>
		 <option value="<?=$row['doc_id'];?>"><?=$row['h_name'];?></option>
		<?php endwhile;?>
		</select>
	</div>

	<div class="form-group">
		<label for="doctor">Doctors</label>
		<select class="form-control" name="doctor" id='doctor'>
		<option value="<?=((isset($_POST['doctor'])&& $_POST['doctor']=='')?'selected':'');?>">Select doctors</option>
			<?php while($row=mysqli_fetch_assoc($sel_doctors_sql)):?>
				<option>select doctor</option>
			<?php endwhile;?>
		</select>
	</div>
	<div class="form-group">
	    <select name="year" class="form-control" id='year'>
			<option value="">select year</option>
			<option value="<?=date('Y');?>"><?=date('Y');?></option>
							
		</select>
	</div>
	
	 <div class="form-group">
		<label for="month">month</label>
			<select name="month" class="form-control">
				<option value="null">select month</option>
				<option value="january">january</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">February</option>
				<option value="september">september</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>
			</select>
		</div>
	<div class="form-group">
		<label for="day"> month day</label>
		<input type="text" class="form-control" name="day">
	</div>	
	<div class="form-group">
		<label for="working_day">working week</label>
		<select name="working_day" class="form-control">
			<option value="">select day</option>
			<option value="sunday">sunday</option>
			<option value="monday">monday</option>
			<option value="tuesday">tuesday</option>
			<option value="wednesday">wednesday</option>
			<option value="thursday">thursday</option>
			<option value="friday">friday</option>
			<option value="saturday">saturday</option>
		</select>
	</div>
	<div class="form-group">
		<label for="time">Time</label>
		<input type="text" name="time" class="form-control" placeholder="10AM-11AM"/>
		
	</div>
	<div class="form-group">
		<label for="priority">priority</label>
		<select name="priority" class="form-control">
			<option>give the priority</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
		</select>
	</div>
	<input type="submit" name="add" value="ADD" class="btn btn-success btn-md" />
</form>
<br/>
<a href="index.php" style="background:red;font-size:15px;padding:10px; color:white;" class="pull-left">GO BACK</a>
</div>
<?php
if(isset($_POST['add']))
{
	$year=$_POST['year'];
	$month=$_POST['month'];
	$day=$_POST['day'];
	$hospital=$_POST['hospital'];
	$doctor=$_POST['doctor'];
	$week_name=$_POST['working_day'];
	$time=$_POST['time'];
	$priority=$_POST['priority'];
	$hospital=$_POST['hospital'];
	$doctor=$_POST['doctor'];
	$sql=mysqli_query($conn,"INSERT INTO tbl_working_day(year,month,day,week_name,working_time,doc_id,h_id,priority,time_id) VALUES('$year','$month','$day','$week_name','$time','$doctor','$hospital','$priority','$priority')");
	if($sql){
		echo"<h1>sucess!</h1>";
	}else{
		echo"something wrong".$sql."<br/>".mysqli_error($conn);
	}
	// $url="add_working_day.php";
	// if(headers_sent()){
	// 	die('<script type="text/javascript">window.location.href="'.$url.'"</script>');
	// }else{
	// 	header('Location:$url');
	// 	die();
	// }
}
?>
</section>
<?php include 'includes/footer.php';?>
