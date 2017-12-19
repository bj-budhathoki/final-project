<?php
require_once 'core/init.php';
//selecting the data from the doctors table
$sql="SELECT tbl_doctors.d_photo, tbl_doctors.d_name, tbl_departments.dep_name FROM tbl_doctors INNER join tbl_departments ON tbl_doctors.d_id=tbl_departments.dep_id ORDER BY RAND()";
$result=mysqli_query($conn,$sql);

//selet hospitlas
$sel_hospotals=mysqli_query($conn,"SELECT * FROM tbl_hospitals");

$sel_department=mysqli_query($conn,"SELECT * FROM tbl_departments");
                                   
?>
<style>
  .service-block  {
        border:2px solid gray;
        border-radius:20px;
        max-height: 250px;
        overflow: hidden;
    }
.emrgence-form{
    border:3px solid blue;
    max-height:500px;
    padding:10px;
    border-radius:30px;
}
.emrgence-form textarea{
    resize: none;

}
</style>
<section class="section-showcase">
        <div class="container showcase-content">
            <h1 style="text-transform:uppercase">online doctor appointmet booking scheduler</h1>
            <p class="lead">SAVA YOUR VALUABLE TIME</p>
            <div class="download">
                <button type="submit" class="btn btn-primary btn-lg" style="border-radius: 0;"  data-target="#login-model" data-toggle="modal" id="btn-login">LOGIN</button>
                 <button class="btn btn-primary btn-lg" style="border-radius: 0;"  data-target="#signup-model" data-toggle="modal">SIGNUP</button>
            </div>

        </div>
    </section>
   
    
<!--login model-->
<div id="login-model" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
         <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="login.php">
            <div class="form-group">
                <input type="text" name="email" placeholder="username" class="form-control" />
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="password" class="form-control" />
            </div>
            <button type="submit" class="btn btn-success btn-md" style="border-radius:0;" name="login" id="login">login</button>

            <label class="checkbox-inline pull-right">
                <input type="checkbox" value="" style="height:20px; width:20px; margin-right:150px;" name="remember"/>
                <font color="red">Remember me</font>
            </label>
        </form>
      </div>
      
    </div>

  </div>
</div>

<!--signup model-->
<div id="signup-model" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
         <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="sign-up.php">
            <div class="form-group">
                <input type="text" name="username" placeholder="username" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="text" name="address" placeholder="address" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="text" name="phone" placeholder="phone" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="email" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="password" class="form-control" required />
            </div>
            <button type="submit" class="btn btn-success btn-md"  name="signup" style="border-radius:0;">signup</button>
      </div>
      
    </div>

  </div>
</div>
