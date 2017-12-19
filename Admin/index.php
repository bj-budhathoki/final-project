<?php session_start();?>
<?php include '../core/init.php';?>
<?php include 'includes/header.php';?>
<?php
$qry=mysqli_query($conn,"SELECT * FROM tbl_hospitals");
$sel_doc=mysqli_query($conn,"SELECT * FROM tbl_doctors");

?>
<section class="login-img3-body">
	<div class="container">
      <form class="login-form"  method="POST">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <select class="form-control"  required name="hospital">
                <option value="null">Select your hospital</option>
                <?php while($fetch_hos=mysqli_fetch_array($qry)):?>
                <option value="<?=$fetch_hos['h_name'];?>"><?=$fetch_hos['h_name'];?></option>
               <?php endwhile;?>
              </select>
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="email" class="form-control" placeholder="email" autofocus required name="email">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" required name="password">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>
            <div class="btn btn-primary btn-lg btn-block" data-target="#signup_modal" data-toggle="modal">SIGNUP</div>
        </div>

  </form>
</section>
<!--modal  for the admin sign up-->
<div id="signup_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">REGISTRATION FORM</h4>
      </div>
      <form method="POST" action="">
      <div class="modal-body">
            <div class="form-group">
               <input type="text" class="form-control" placeholder="hospital name" autofocus  name="hospital_name" required>
            </div>
            <div class="form-group">
               <input type="text" class="form-control" placeholder="hospital address"   name="hospital_address" required>
            </div>
            <div class="form-group">
               <input type="text" class="form-control" placeholder="hospital phone"   name="hospital_phone" required>
            </div>
            <div class="form-group">
               <input type="file" class="form-control"    name="hospital_pic" required>
            </div>
            <div class="form-group">
               <textarea  class="form-control" placeholder="hospital details"   name="hospital_details"></textarea>
            </div>
            <div class="form-group">
               <input type="email" class="form-control" placeholder="email" autofocus  name="email" required>
            </div>
            <div class="form-group">
               <input type="password" class="form-control" placeholder="password"  name="password" required>
            </div>
            <div class="form-group">
               <select  class="form-control"   name="doctor" required>
                 <?php
                  while($fetch_doc=mysqli_fetch_array($sel_doc)):?>
                  <option value="<?=$fetch_doc['d_id'];?>"><?=$fetch_doc['d_name'];?></option>
                <?php endwhile ; ?>
               </select>
            </div>
          
      </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" name="admin_signup">Register</button>
        </div>
    </form>
    </div>
  </div>
</div> 
<?php
//checking for validation
if(isset($_POST['login'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $hospital=$_POST['hospital'];
	$sel_admin=mysqli_query($conn,"SELECT  admin_id, Email,password,hospital FROM tbl_admin WHERE Email='$email' AND password='$password' AND hospital='$hospital'");
  $fetch_match=mysqli_fetch_array($sel_admin);
  $count=mysqli_num_rows($sel_admin);
  if($count>0){
    $_SESSION['user']=$fetch_match['admin_id'];
    $_SESSION['hospital']=$fetch_match['hospital'];
    echo("<script>location.href ='welcome.php';</script>");
  }else{
   echo("<script>location.href ='index.php';</script>");
 }
}
?>
<!--retriving the sign up form data-->
<?php
if(isset($_POST['admin_signup']))
{
  $hospital_name=$_POST['hospital_name'];
  $hospital_address=$_POST['hospital_address'];
  $hospital_phone=$_POST['hospital_phone'];
  $hospital_pic=$_POST['hospital_pic'];
  $hospital_details=$_POST['hospital_details'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $doctor=$_POST['doctor'];
  $insert_admin=mysqli_query($conn,"INSERT INTO tbl_admin(hospital,Email,password)VALUES('$hospital_name','$email','$password')");
  if($insert_admin){
    echo "success";
   mysqli_query($conn,"INSERT INTO tbl_hospitals(`h_name`,`h_address`,`phone`,`pic`,`about`,`doc_id`)VALUES('$hospital_name','$hospital_address','$hospital_phone','$hospital_pic','$hospital_details','$doctor')");
    echo("<script>location.href ='index.php';</script>");
  }else{
    echo "fail";
  }
}


?>
<?php include 'includes/footer.php';?>