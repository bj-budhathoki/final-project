<footer class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                     <div class="col-md-4">
                        
                        <h5>&copy;-2017 appointment scheduler.All Right Reserved</h5>
                    </div>
                     <div class="col-md-4">
                    </div>
                </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/clockface.js"></script>
    <script src="js/jquery.bxslider.js"></script>

<!--for the navigation addign active class-->
<script>
    $(document).ready(function(){
      $("#home a:contains('HOME')").parent().addClass('active');
       $("#department a:contains('DEPARTMENT')").parent().addClass('active');
      
    });
</script>


<!-- for doc slider-->
    <script>
            $(document).ready(function(){
      $('.doc-slider').bxSlider({
        slideWidth: 300,
        minSlides: 2,
        maxSlides: 4,
        moveSlides: 1,
        slideMargin: 10
      });
});
    </script>
   
    <script>
        function doc_profile(id){
        var data = {"Did" : id};
        jQuery.ajax({
            url:"includes/doctor-profile.php",
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
    <script>

        function get_departmant()
        {
            var hospitalID=jQuery('#hospital').val();
            jQuery.ajax({
                url:'select-hospital-department.php',
                type:'POST',
                data:{hospitalID: hospitalID},
                success:function(data){
                    jQuery('#department').html(data);
                },
                error:function(){alert('something wrong')},
            });
      
        }
        jQuery('select[name="hospital"]').change(get_departmant);
        
    </script>
    <script>
         function get_hospital_doctors()
        {
            var hospitalID=jQuery('#hospital').val();
            jQuery.ajax({
                url:'select-hospital-doctor.php',
                type:'POST',
                data:{hospitalID: hospitalID},
                success:function(data){
                    jQuery('#doctors').html(data);
                },
                error:function(){alert('something wrong')},
            });
      
        }
        jQuery('select[name="hospital"]').change(get_hospital_doctors);
    </script>
    <script>
         function get_department_doctors()
        {
            var departmentID=jQuery('#department').val();
            jQuery.ajax({
                url:'select-department-doctors.php',
                type:'POST',
                data:{departmentID: departmentID},
                success:function(data){
                    jQuery('#doctors').html(data);
                },
                error:function(){alert('something wrong')},
            });
      
        }
        jQuery('select[name="department"]').change(get_department_doctors);
    </script>
    <script>
         function get_doctors_working_day()
        {
            var doctorID=jQuery('#doctors').val();
            jQuery.ajax({
                url:'select_doctor_working_day.php',
                type:'POST',
                data:{doctorID: doctorID},
                success:function(data){
                    jQuery('#working_day').html(data);
                },
                error:function(){alert('something wrong')},
            });
       
        }
        jQuery('select[name="doctor"]').change(get_doctors_working_day);
    </script>
    <script>
         function get_doctors_working_time()
        {
            var emergency=jQuery('#emergency').val();
            var day_id=jQuery('#week_name').val();
            var month=jQuery('#month').val();
        
            jQuery.ajax({
                url:'select-working-time.php',
                type:'POST',
                data:{day_id:day_id,emergency:emergency},
                success:function(data){
                    jQuery('#available_time').html(data);
                },
                error:function(){alert('something wrong')},
            });
      
        }
        jQuery('select[name="working_day"]').change(get_doctors_working_time);

    </script>
 
    
</body>

</html>