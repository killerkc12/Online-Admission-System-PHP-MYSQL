<?php
session_start();
error_reporting(0);

include 'config.php';

$name=$_REQUEST["in_name"];
$email=$_REQUEST["in_eml"];
$mob=$_REQUEST["in_mob"];
$sex=$_REQUEST["in_sex"];
$dob=$_REQUEST["in_dob"];
$pass1 =$_REQUEST["in_pass"];
$pass2  =$_REQUEST["in_pass2"];


if(isset($_REQUEST["studupdate"]))
{
    $sql ="update t_user_data set s_pwd='$pass1' , s_dob='$dob', s_name='$name', s_email='$email',";
    $sql.="s_mob'$mob', sex='$sex' where s_id='".$_SESSION['user']."'";
    
    $update=mysqli_query($con, $sql);
    if($update)
    {
        
        echo "<script type='text/javascript'>alert('Details Updated !!');</script>";
        header('location:admin.php#adregister');
    }
    else {
        echo "<script type='text/javascript'>alert('Eroor !!');</script>";
    }
    
}


$q=mysqli_query($con,"select s_name from t_user_data where s_id='".$_SESSION['user']."'");
$n=  mysqli_fetch_assoc($q);
$stname= $n['s_name'];


?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
         <script language="javascript" type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
         <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        
        
    </head>
     <body style="background-image:url('./images/inbg.jpg');">
        <form id="edform" action="editstudent.php" method="post">
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                       
                  </div>
                 </div>    
             </div>
            <div id="dmid" class="container-fluid">  
                
                 <div class="row">
                    <div class="col-sm-12">
                        <font style="color:white; margin-left:520px; font-family: Verdana; width:100%; font-size:30px;">
                        <b>EDIT Institute</b> </font>
                      </div>
                 </div>
                
             </div>
                       
                       
            <table class="frmtbl">
                <?php
            
                    $result = mysqli_query($con,"SELECT * FROM t_user_data WHERE s_id='".$_SESSION['user']."'");

                            while($row = mysqli_fetch_array($result))
                              {
                        
                ?>
                 <tr>
                    <td>
                        <font style="color:black; margin-left:30px; font-family: Verdana;  margin-top:15px; font-size:17px;">Name * </font>
                    </td>
               
                    <td  style="padding-bottom: 1em;">
                        <input type="text" id="in_name" name="in_name" value="<?php echo $row['s_name']?>" VT="NM">
                    </td>
                </tr>
                <tr>
                    <td>
                        <font style="color:black; margin-left:30px; font-family: Verdana;font-size:17px;">Date of Birth * <font>
                    </td>
               
                    <td  style="padding-bottom: 1em;">
                        <input type="text" id="in_dob" name="in_dob" value="<?php echo $row['s_dob']?>">
                         <script type="text/javascript">
                            $(function() {
                            $("#in_dob").datepicker({ dateFormat: 'yy-mm-dd', yearRange:'-25:+0', changeYear:true, changeMonth:true});
                        });
                         </script>
                    </td>
                </tr>
                 <tr>
                    <td>
                       <font style="color:black; margin-left:30px; font-family: Verdana;font-size:17px;" required> Email ID * <font>
                    </td>
                 
                    <td  style="padding-bottom: 1em;">
                        <input type="email" id="in_eml" name="in_eml" value="<?php echo $row['s_email']?>" VT="EML">
                    </td>
                </tr>
                
                <tr>
                    <td>
                       <font style="color:black; margin-left:30px; font-family: Verdana;font-size:17px;" required> Mobile No. *<font>
                    </td>
                
                    <td  style="padding-bottom: 1em;">
                        <input type="number" id="in_mob" name="in_mob" value="<?php echo $row['s_mob']?>" VT="PH" onKeyPress="if(this.value.length==10) return false;">
                    </td>
                </tr>
                <tr>
                    <td  style="padding-bottom: 1em;">
                       <font style="color:black; margin-left:30px; font-family: Verdana;font-size:17px;" required> Gender : *<font>
                       <input type="text" name="in_gender" id="in_gender" value="<?php echo $row['sex']?>"></input>
                        </td>
                
                    <td>
                    <font style="color:black; margin-left:30px; font-family: Verdana;font-size:17px;">
                        <input type="radio" id="in_sex" name="in_sex" VT="ML" value="male"> Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="in_sex" name="in_sex" VT="FL" value="female"> Female
                     </font>
                    </td>
                </tr>
                <tr>
                    <td>
                       <font style="color:black; margin-left:30px; font-family: Verdana;font-size:17px;"> Password *<font>
                    </td>
                
                    <td  style="padding-bottom: 1em;">
                        <input type="password" id="in_pass" name="in_pass" maxlength="10">
                    </td>
                </tr>
                <tr>
                    <td>
                       <font style="color:black; margin-left:30px; font-family: Verdana;font-size:17px;"> Confirm Password *<font>
                    </td>
                 
                    <td  style="padding-bottom: 1em;">
                        <input type="password" id="in_pass2" name="in_pass2" VT="P2" maxlength="10">
                    </td>
                </tr>                       
                           
                           <tr>
                                <td colspan="4">
                                   <center> <input type="submit" onclick="validate();" id="studupdate" name="studupdate" value="UPDATE"></center>
                                </td>
                           </tr>
                           
                           <?php
                           
                              }
                           ?>
                       </table>
            <br>
                       
                            
            <br>
                       
                  </form>
            </body>
</html>
