<?php 
require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/class.smtp.php';
include '../core/init.php';

if(isset($_GET['pid']) && isset($_GET['p_email'])){
	 $pid=$_GET['pid'];
	 $p_email=$_GET['p_email'];
	$p_name=$_GET['p_name'];
	$hospital=$_GET['hospital'];
 $qry=mysqli_query($conn,"UPDATE tbl_appointment SET appointment_status='Approved' WHERE p_id='$pid'");

 if($qry){
 	  $mail = new PHPMailer;
                $email=$p_email;
                // $name="AP";
                $email_from="docscheluder79@gmail.com";
                $name_from="appointment scheduler";
                $mail->SMTPDebug=3;
                $mail->IsSMTP(); // telling the class to use SMTP
                $mail->SMTPAutoTLS = false;
                $mail->SMTPAuth = true; // enable SMTP authentication
                $mail->Host = 'ssl://smtp.gmail.com:465';
                $mail->Username = "docscheluder79@gmail.com"; // GMAIL username
                $mail->Password = "project123@"; // GMAIL password
			    $mail->SMTPOptions = array(
			    'ssl' => array(
			        'verify_peer' => false,
			        'verify_peer_name' => false,
			        'allow_self_signed' => true
			    )
			);
                    // Typical mail data
                  $mail->SetFrom($email_from, $name_from);
                    $mail->AddAddress($p_email);
                    $mail->Subject = "doctor appointment";
                    $mail->isHTML(true);
                    $mail->Body = "<h1>sorry<h1><br/><h4>".$p_name."</h4><br/><p>you appointment has been Approved for  " .$hospital."<br/>thank you</p> ";

                    try{
                        $mail->Send();
                        echo "<h1> Hello you booked the appointment</h1><br/>";
                        
                    } catch(Exception $e){
                        // Something went bad
                        echo "Fail" . $mail->ErrorInfo;
                    }
 }
}

?>