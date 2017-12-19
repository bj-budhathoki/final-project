
<?php include '../core/init.php';
   if(isset($_SESSION['user']))
{  
 $user=$_SESSION['user'];
   
}
$sql=mysqli_query($conn,"SELECT * FROM tbl_admin WHERE admin_id='$user'");
$row=mysqli_fetch_assoc($sql);
$username=$row['hospital'];

?>

<header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="welcome.php" class="logo">DOCTOR <span class="lite">Appoitmnet</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                    <!-- user login dropdown start-->
                    <li class="dropdown" style="padding-top:10px;">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                            </span>
                            <span class="username"><?=$username;?></span>
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
            </div>
      </header>      
      <!--header end-->
