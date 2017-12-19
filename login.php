  <?php session_start();?>
 <?php
 require_once 'core/init.php';
                if(isset($_POST['login'])){
                    $email=$_POST['email'];
                   $password=$_POST['password'];
                   $sql="SELECT u_id,u_email,password FROM tbl_users WHERE u_email='$email' AND password='$password'";
                    $res=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($res);
                     $count=mysqli_num_rows($res);
                     if($count!=0){
                     	$_SESSION['user']=$row['u_email'];
                        $_SESSION['u_id']=$row['u_id'];
                       header("Location:welcome.php");

                     }else{
                        echo"your password or email does not match please try again.";
                        //header('refresh:2;url=index.php');
                     }
                   
                }else{
                    echo'something wrong';
                }
    ?>
<?php include 'includes/footer.php';?>
