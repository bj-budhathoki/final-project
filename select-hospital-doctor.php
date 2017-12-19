<?php
include 'core/init.php';
$hospitalId=$_POST['hospitalID'];
$sql="SELECT * FROM tbl_doctors WHERE h_id='$hospitalId'";
$result=mysqli_query($conn,$sql);

ob_start();
?>
<option value=""></option>
<?php while($row=mysqli_fetch_assoc($result)):?>
<option value="<?=$row['d_id'];?>"><?=$row['d_name'];?></option>
<?php endwhile;?>
<?php echo ob_get_clean();?>