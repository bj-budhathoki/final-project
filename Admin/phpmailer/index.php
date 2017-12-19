<?php
require 'PHPMailerAutoload.php';
require 'class.smtp.php';
                $mail = new PHPMailer;
                $email='bijayabudhathoki98@gmail.com';
                $name="bj";
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
                    $mail->AddAddress($email, $name);
                    $mail->Subject = "doctor appointment";
                    $mail->isHTML(true);
                    $mail->Body = "Hello  from the localhost";

                    try{
                        $mail->Send();
                        echo "<h1> Hello you booked the appointment</h1><br/>";
                        
                    } catch(Exception $e){
                        // Something went bad
                        echo "Fail" . $mail->ErrorInfo;
                    }

            
?>