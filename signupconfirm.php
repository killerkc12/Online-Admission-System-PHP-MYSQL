<?php
if(isset($_REQUEST["u_sub"]))
header('location:index.php');

?>


<?php

extract($_POST);
//$stid=$_REQUEST["in_eml"];
//$stpw=$_REQUEST["stpw"];
$name=$_REQUEST["in_name"];
$dob=$_REQUEST["in_dob"];
$eml=$_REQUEST["in_eml"];
$mob=$_REQUEST["in_mob"];
$sex=$_REQUEST["in_sex"];
$pas=$_REQUEST["in_pass"];

include 'config.php';
            $rs1=mysqli_query($con,"select * from t_user_data where s_email='$eml'");
if (mysqli_num_rows($rs1)>0)
{
	echo '
    <font style="color:red; margin-left:520px; font-family: Verdana; width:100%; font-size:30px;">
                                        <h5>Email ID Already Exists</h5></font>
                            ';
	exit;
}
if(isset($_REQUEST["in_sub"]))
{
    //if($stid == "")
    //$stid = StudentCode();
   // if($stpw == "")
   // $stpw = StudentPsw();
    
    $sql  = "insert into t_user_data values(";
    $sql .= "'" . $eml . "',";
    $sql .= "'" . $pas . "',";
    $sql .= "'" . $dob . "',";
    $sql .= "'" . $name . "',";
    $sql .= "'" . $eml . "',";
    $sql .= "'" . $mob . "',";
    $sql .= "sysdate(),";
    $sql .= "'" . $sex . "')";
    
    
        $done = mysqli_query($con, $sql);
    

 
//     header('location:signupconfirm.php');
     
     
      
}


  
?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
       <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <script language="javascript" type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
        <script language="javascript" type="text/javascript" src="jquery/jquery-ui.js"></script>
        <link href="jquery/jquery-ui.css" rel="stylesheet" type="text/css" />


        <link type="text/css" rel="stylesheet" href="css/sign.css"></link>
         
       <script>
    function valid(inputtxt)  
    {  
      var phoneno = /^\d{10}$/;  
      if(inputtxt.value.match(phoneno))  
      {  
          return true;  
      }  
      else  
      {  
         alert("Not a valid Phone Number");  
         return false;  
      }  
      }  
  </script>
        
        
        
        
    </head>
    
    
    <body style="background-image:url('./images/inbg.jpg');">
        <form id="signupconfirm" action="signupconfirm.php" method="post">
  
            <div id="dvlogin" style="box-shadow: 0px 5px 10px #999999">
                    <?php
                        
                    ?>
            </div>
                    
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                       <!--  <img src="images/cutm.jpg" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img> -->
                  </div>
                 </div>    
             </div>
        <div id="dmid">
            
        </div>
        <div id="ddown">
            <br><br><br>
             <div id="dright">
                 <br><br><br><br><br>
                 <center><font style="color: #3399ff; margin-left:30px; font-family: Verdana;font-size:20px;">
                     <?php  $done=require_once("mail-content.php");  
                       echo "Your User ID/Email is $eml and Password is $pas" ; ?><br>
                    You are successfully registered. </font>
                 <br><br>
            
                 <input type="submit" id="u_sub" name="u_sub" value="Login" class="toggle btn btn-primary" style="width:100px; margin-left: 200px;"><br><br>
                 </center>
             </div>
        </div>
        
        </form>
    </body>
</html>
