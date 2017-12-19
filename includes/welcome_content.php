<?php
require_once 'core/init.php';
//selecting the data from the doctors table
$sql="SELECT * FROM tbl_doctors ORDER BY RAND() limit 4";
$result=mysqli_query($conn,$sql);
?>
<section class="section-showcase">
        <div class="container showcase-content">
            <h1>online doctor appointmet booking scheduler</h1>
            <p class="lead">simply make your life easier...</p>
            <div class="download">
            <button class="btn btn-primary btn-lg" style="border-radius: 0;">
                <a href="appointment.php" style="color: white;text-decoration: none;">MAKE AN APPOINTMENT</a>
            </button>
                 <button class="btn btn-primary btn-lg" style="border-radius: 0;">
                <a href="your_appointment.php?email=<?php echo$_SESSION['user']?> &&id=<?php echo$_SESSION['u_id']?>" style="color: white;text-decoration: none;">YOUR APPOINTMENT</a>
            </button>
            </div>

        </div>
    </section>
    <section class="section-dark">
            <div class="container">
                <h3 class="text-center">OUR SERVICES</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="block  block-center service-block">
                            <i class="fa fa-ambulance fa-primary fa-4 fa-border"></i>
                            <h3 class="heading-primary">Ambulance Service</h3>
                            <p>We provide ambulance service for you.</p>
                            <button  class="btn btn-success"><a href="" style="color:#ffffff;">MORE </a></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="block  block-center service-block">
                        <i class="fa fa-heart-ofa fa-medkit fa-primary fa-4 fa-border"></i>
                        <h3 class="heading-primary">Blood donation</h3>
                        <p>online doctors appointment also provide blood danation facility for you.</p>
                        <button  class="btn btn-success"><a href="blood-donors-list.php" style="color:#ffffff;">MORE</a> </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="block  block-center service-block">
                        <i class="fa fa-hospital-o fa-primary fa-4 fa-border"></i>
                        <h3 class="heading-primary">Appointment service</h3>
                        <p>online doctors appointment also provide easy appointment for you.</p>
                        <button  class="btn btn-success"><a href="appointment.php" style="color:#ffffff;">MORE</a> </button>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="block  block-center service-block">
                        <i class="fa fa-medkit fa-primary fa-4 fa-border"></i>
                        <h3 class="heading-primary">Medicine</h3>
                        <p></p>
                    </div>
                </div>
            </div>
    </section>
    <section class="section-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form class="search">
                        <div>
                            <h1>MEET OUR DOCTORS</h1>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row doc-slider">
                <?php while($row=mysqli_fetch_assoc($result)):?>
                     <div class="col-md-3">
                     <div class="block block-secondary">
                        <img src="images/<?=$row['d_photo'];?>" width="100%" height="300"><br/><br/>
                        
                        <button class="btn btn-default view-profile" onclick="doc_profile(<?=$row['d_id'];?>)" style="margin-top:0px;">View Profile</button>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
        </div>
    </section>
    
    
    <section class="section-primary extra-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-info-left">
                        <h4><u>HAPPY CUSTOMERS</u></h4>
                        <h1>Powered by over 4,000 Patients.</h1>
                        <a href="#" class="btn btn-lg btn-default join-now"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> JOIN NOW</a>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="footer-info-right">
                <div class="row footer-right-top">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="fa fa-plus-square fa-6" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-8">
                                <h4>24242</h4>
                                <h5>TOTAL HOSPITAL</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="fa fa-user-o fa-6" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-8">
                                <h4>24242</h4>
                                <h5>SATISFIED PATIENT</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="fa fa-trophy fa-6" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-8">
                                <h4>24242</h4>
                                <h5>DOCTORS MEDALS</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="row">
               
                 <div class="col-sm-4">
                            <i class="fa fa-heart-o fa-6" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-8">
                            <h4>24242</h4>
                            <h5>QUALIFIED STAFF</h5>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </section>


<!--signup model-->
<div id="signup-model" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
         <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <input type="text" name="username" placeholder="name/username" class="form-control" />
            </div>

            <div class="form-group">
                <input type="password" name="username" placeholder="password" class="form-control" />
            </div>
            <div class="form-group">
                <input type="text" name="address" placeholder="address" class="form-control" />
            </div>
            <div class="form-group">
                <input type="text" name="phone" placeholder="phone" class="form-control" />
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="email" class="form-control" />
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="password" class="form-control" />
            </div>
            <button type="submit" class="btn btn-success btn-md" style="border-radius:0;">signup</button>
      </div>
      
    </div>

  </div>
</div>
