 
 <!-- javascripts -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="../js/clockface.js"></script>
    
   
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    
 <script>
        function dmodel(id){
        var data = {"Did" : id};
        jQuery.ajax({
            url:"doc_profile.php",
            method: "post",
            data : data,
            success: function(data){

                jQuery('body').append(data);
                jQuery("#myModal").modal('toggle');
            },
            error: function(){
                alert("somthing wrong!!!");
            }

        });
    }
    </script>
  </script>
  <!--for hospital doctors-->
  <script>
     function get_hospital_doctors()
        {
            var hospitalID=jQuery('#hospital').val();
            jQuery.ajax({
                url:'select_hospitals_doctors.php',
                type:'POST',
                data:{hospitalID: hospitalID},
                success:function(data){
                    jQuery('#doctor').html(data);
                },
                error:function(){alert('something wrong')},
            });
      
        }
        jQuery('select[name="hospital"]').change(get_hospital_doctors);
  </script>



  </body>
</html>
