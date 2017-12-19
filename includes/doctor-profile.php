<?php
include '../core/init.php';
 $Did=$_POST['Did'];
 $sql=mysqli_query($conn,"SELECT * FROM tbl_doctors WHERE d_id='$Did'");

 $row=mysqli_fetch_assoc($sql);

     $id=$row['d_id'];
      $qry=mysqli_query($conn,"SELECT * FROM tbl_departments WHERE dep_id='$id'");
    $fet_qry=mysqli_fetch_assoc($qry);
?>
<?php ob_start();?>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title text-center"><?php echo strtoupper($row['d_name']);?></h2>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3">
            <img src="images/<?=$row['d_photo'];?>" class="img-responsive img-thumbnail">
          </div>
          <div class="col-md-9">
            <p><b>Name:</b>&nbsp;<?php echo $row['d_name'];?></p>
             <p><b>Address:</b>&nbsp;<?php echo $row['d_address'];?></p>
             <p><b>Email:</b>&nbsp;<?php echo $row['d_email'];?></p>
            <p><b>profession:</b>&nbsp;<?php echo $row['d_profession'];?></p>
            <p><b>Experince:</b>&nbsp;<?php echo $row['d_experience'];?></p>
            <b>About Doctor</b>
            <div style="border:1px solid silver; width:100%; min-height:200px; padding:10px;">
            <?php echo $row['about_doctor'];?>
            </div>
          </div>
      
        </div>
        
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-lg pull-left" style="border-radius: 0;" name="book"><a href="appointment.php?doc_id=<?=$id;?>"><font color="white">MAKE AN APPOINTMENT</font></a></button>
          <button type="button" class="btn btn-primary btn-lg" style="border-radius: 0;" data-dismiss="modal" onclick="closeModal()">Close</button>
        
      </div>
    </div>

  </div>
</div>
<script>
    function closeModal() {
        jQuery('#myModal').modal('hide');
        location.reload('index.php');
    }
</script>
<?php echo ob_get_clean();?>