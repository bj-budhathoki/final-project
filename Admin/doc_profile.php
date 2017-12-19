<!-- Modal -->
<?php include '../core/init.php';?>
<?php include 'includes/header.php';?>
<?php
$id=$_POST['Did'];
?>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" onclick="closeModel();">&times;</button>
        <h4 class="modal-title text-center">Doctors profile</h4>
      </div>
      <div class="modal-body">
          <?php 
           $sql=mysqli_query($conn,"SELECT *  FROM tbl_doctors WHERE d_id='$id'");
           $result=mysqli_fetch_assoc($sql);
          ?>
          <div class="row">
            <div class="col-sm-6">
              <div class="d-img">
                  <img src="../images/<?=$result['d_photo'];?>" style="border:5px solid silver;width:100%"/>
              </div>
            </div>
             <div class="col-sm-6">
               <h4><b>Name:</b> <?=$result['d_name'];?></h4>
               <h4><b>Address:</b> <?=$result['d_address'];?></h4>
               <h4><b>Phone:</b><?=$result['d_phone'];?></h4>
               <h4><b>Email:</b><?=$result['d_email'];?></h4>
               <h4><b>Specialist:</b><?=$result['specialist'];?></h4>
               <h4><b>Qualification:</b><?=$result['qualification'];?></h4>
               <h4><b>Experience:</b> <?=$result['experience'];?></h4>
               <h4><b>Work at:</b> DR.<?=$result['d_name'];?> currently working ..........</h4>
             </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="closeModel();">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
function closeModel()
   {
    jQuery('#myModal').modal('hide');
      location.reload('view_doctors.php');
   }
   </script>