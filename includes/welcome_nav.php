
<!-- Navigation -->
<style>
    .department-menu{
        width: 400px;
        height: 200px;
        background-color:white;
        padding:20px;
         color:red;
    }
     .department-menu li a{
        color:red;
     }
</style>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="welcome.php">HOME</a>
                    </li>
                    <li>
                        <a href="department.php">DEPARTMENT</a>
                    </li>
                   <li>
                        <a href="doctors-list.php">DOCTORS</a>
                    </li>
                    <li>
                        <a href="hospitals.php">HOSPITAL</a>
                    </li>
                    <li>
                        <a href="blood-donors-list.php">B-DONER</a>
                    </li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-sub">
                    <li><a href="appointment.php">APPOINTMENT</a></li>
                    <!--<li><a href="#">Hello!<?php echo $_SESSION['user'];?></a></li>-->
                    <li>
                        <a href="Appointment-reserved.php">BOOKED APPOINTMENT</a>
                    </li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.container -->
    </nav>


