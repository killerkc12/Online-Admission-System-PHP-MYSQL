<?php
error_reporting(0);
include 'config.php';


$result1 = mysqli_query($con,"select pass2 from login where s_id='".$email."'");
$n = mysqli_fetch_assoc($result1);
$pass1 = $n['pass2'];

$result = mysqli_query($con,"select s_first_name from user_data where s_id='".$email."'");
$n = mysqli_fetch_assoc($result);
$name = $n['s_first_name'];
 
    include 'mail/email.php';
    $msg="
Dear   $name,

      <p> User Id : $email </p>
      <p> Password : $pass1 </p>
      
      <p style='color:red;'>........this is a autogenerated mail don't reply to it........</p>";
    
    
    $mail->From = $from1;
    $mail->FromName = "Online Admission System"; // Name to indicate where the email came from when the recepient received
    $mail->AddAddress($email); // this is for receiver mail id
    $mail->WordWrap = 50; // set word wrap
    $mail->IsHTML(true); // send as HTML
    $mail->Subject = "Password Recovery-: "; //used for mail subject
    $mail->Body =$msg; //HTML Body
    if(!$mail->Send())
    {
        echo "Your internet is slow<br>";
    }
    else
    {
        echo "<script>alert('Check your email for password'); window.location.href='index.php';</script>";
    }