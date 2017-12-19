<?php require_once 'core/init.php';?>
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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="home">
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
                        <a href="index.php">HOME</a>
                    </li>
                    <li>
                        <a href="department.php">DEPARTMENT</a>
                    </li>
                    
                    <li>
                        <a href="hospitals.php">HOSPITAL</a>
                    </li>
                    <li>
                        <a href="blood-donors-list.php">DONATE BLOOD</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-sub pull-right">
                <li><a href="Appointment-reserved.php">BOOKED APPOINTMENT</a></li>
                    <li><a href="#" data-target="#signup-model" data-toggle="modal">SIGNUP</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.container -->
    </nav>
    