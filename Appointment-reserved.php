<?php include 'core/init.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/welcome_nav.php';?>
<?php
$appoitment=mysqli_query($conn,"SELECT * FROM  tbl_appointment ORDER BY arrival_time ASC ");
if($appoitment){
	$appoitment1=mysqli_query($conn,"SELECT * FROM  tbl_appointment ORDER BY deadline ASC ");
}
$sn=0;
?>
<hr/>
<section style="margin-top:90px; margin-bottom:250px;">
    <div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-2">
            <div class="form-group">
                <select id="hospitals" class="form-control" name="hospitals" required>
                    <?php
                        $sel_hospital=mysqli_query($conn,"SELECT * FROM tbl_hospitals");
                        while($fet_hos=mysqli_fetch_assoc ($sel_hospital)):?>
                        <option value="<?=$fet_hos['h_id'];?>"><?=$fet_hos['h_name'];?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <button class="btn btn-info" onclick="get_reserved_appointment();">view</button>
        </div>
    </div>
<hr/>
<div class="row">
    <div class="row">
        <div class="col-md-12">
             <div id="reserved_appointment_list">
                 <h1 class="">select one hospital to view the today's appoitment</h1>
             </div>
        </div>
    </div>
</div>
</div>
</section>


<?php include 'includes/footer.php';?>


 <script>

        function get_reserved_appointment(){
        	var hospital=$('#hospitals').val();
        	 var doc=$('#doctors').val();
        	// var week_day=$('#week_day').val();
        	// var month=$('#month').val();
        	
        jQuery.ajax({
            url:"select_reserved-appointment.php",
            method: "GET",
            data :{hospital,doc},
            success: function(data){
                jQuery('#reserved_appointment_list').html(data);
                //jQuery("#myModal").modal('toggle');
            },
            error: function(){
                alert("somthing wrong!!!");
            }

        });
    }
    </script>
    