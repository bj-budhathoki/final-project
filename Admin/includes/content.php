 <!-- container section start -->
 <?php
 session_start();
include '../core/init.php';
if(isset($_SESSION['user'])){
	$admin_id=$_SESSION['user'];
}
$sel_total=mysqli_query($conn,"SELECT * FROM tbl_appointment WHERE hospital_id='$admin_id' ");
$total_appointment=mysqli_num_rows($sel_total);

$sel_peding=mysqli_query($conn,"SELECT * FROM tbl_appointment WHERE hospital_id='$admin_id' AND appointment_status='pending' ");
$pading_appointment=mysqli_num_rows($sel_peding);

$sel_approved=mysqli_query($conn,"SELECT * FROM tbl_appointment WHERE hospital_id='$admin_id' AND appointment_status='Approved' ");
$approve_appointment=mysqli_num_rows($sel_approved);

 ?>
  <section id="container" class="">
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
              
            <div class="row">	
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="fa fa-tint" aria-hidden="true"></i>
						<div class="count"><a href="appointment.php"><?=$total_appointment;?></a></div>
						<div class="title"><a href="appointment.php">total appointment</a></div>				
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-users" aria-hidden="true"></i>
						<div class="count"><?=$pading_appointment;?></div>
						<div class="title">Pending appointment</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="fa fa-h-square" aria-hidden="true"></i>
						<div class="count"><?=$approve_appointment;?></div>
						<div class="title">Approved appointment</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
			</div><!--/.row-->

      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

