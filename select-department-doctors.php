<?php
include 'core/init.php';
$departmentID=$_POST['departmentID'];
$sql="SELECT * FROM tbl_doctors WHERE dep_id='$departmentID'";
$result=mysqli_query($conn,$sql);

ob_start();
?>
<option value=""></option>
<?php while($row=mysqli_fetch_assoc($result)):?>
<option value="<?=$row['d_id'];?>"><?=$row['d_name'];?></option>
<?php endwhile;?>
<?php echo ob_get_clean();?>