<?php
include 'config.php';


//echo $email;

    if(isset($_POST['in_sub']))
        {
        $eml=($_POST["in_eml"]);
        //$stid=$_REQUEST["stid"];
        $stpw=$_REQUEST["in_pass"];
        $name=$_REQUEST["in_name"];

    include 'mail/email.php';
   $msg="
Dear   $name,

      <p>Your User Id is $eml and password is $stpw </p>
      
      <p style='color:red;'>........this is a autogenerated mail don't reply to it........</p>";


$mail->From = $from1;
$mail->FromName = "Online Admission System"; // Name to indicate where the email came from when the recepient received
$mail->AddAddress($eml); // this is for receiver mail id
$mail->WordWrap = 50; // set word wrap
$mail->IsHTML(true); // send as HTML
$mail->Subject = "Username and Password Comfirmation-: "; //used for mail subject
$mail->Body =$msg; //HTML Body
if(!$mail->Send())
{
 echo "Your internet is slow<br>";        
}
else
{
    echo " Please check your email for User ID and Password.";
}
}