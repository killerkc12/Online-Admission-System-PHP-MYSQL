<?php
error_reporting(0);
$getid= $_GET["id"];
include 'config.php';



$q=mysqli_query($con,"select s_name from user_data where s_id in(select s_id from t_user_course where s_detid='$getid')");
$n=  mysqli_fetch_assoc($q);
$stname= $n['s_name'];
$id=$_SESSION['user'];

$result = mysqli_query($con,"SELECT * FROM t_user_course WHERE s_detid='$getid'");

while($row = mysqli_fetch_array($result))
{
    ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
           <title></title>
        
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
        
         <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
    </head>
     <body style="background-image:url('./images/inbg.jpg');">
        <form id=viform" action="viewform.php" method="post">
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                     <!--    <img src="images/cutm.jpg" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img> -->
                  </div>
                 </div>    
             </div><br>
                <div  class="container-fluid">  
                
                
                
                </div>
         
  <div class="container-fluid">
                            <div class="row">
                               <div class="col-sm-12">
      <center>  <table class="table table-bordered" style="font-family: Verdana">
                
                <tr>
                <!-- <td style="width:3%;"> <img src="./images/Logo-T.gif" width="50%">  </td>-->
                 <td colspan=2 style="width:8%;"><center><font style="font-family:Arial Black; font-size:20px;">
                    ONLINE ADMISSION SYSTEM</font></center>
                
                <br>
               
                <center><font style="font-family:Arial Black; font-size:20px;">
                    </font></center>
                </td>
                    <td colspan="2" width="3%" >
                   <?php
                  
                    $picfile_path ='studentpic/';
                    
                    $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id in(select s_id from t_user_course where s_detid='$getid')");
                        
                    
                    
                    if($row1 = mysqli_fetch_array($result1)) 
                      {                  
                        $picsrc=$picfile_path.$row1['s_pic'];
                        
                        echo "<center><img src='$picsrc.' class='img-thumbnail' width='180px' style='height:180px;'></center>";
                        echo"<div>";
                      }
                   ?>
                        </td>
                 </tr>       
                 <?php 
                 $sql = mysqli_query($con, "select * from user_data where s_id in(select s_id from t_user_course where s_detid='$getid')");
                 while($rs = mysqli_fetch_array($sql))
                 {
                 
                 ?>
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Student's Name : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $rs[1];?> </td>
                 </tr>
                 
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Student's Email : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $rs[3];?> </td>
                 </tr>
                 
                
                  <tr>
                    <td > <font style="font-family: Verdana;">Student's Mobile No.:</font>  </td>
                    <td colspan="3"> <?php echo  $rs[6]; ?><br>
                  </tr>
                
                  
                <tr>
                    <td> <font style="font-family: Verdana;">Sex : </font>
                    <td colspan="3"><?php echo $rs[5] ?></td>       
                    
                </tr>
                
                  
                
                   <td><font style="font-family: Verdana;">Institute Details</font></td>
                   <td colspan="3">
                       <table class="table table-hover">
                           <thead>
                               <tr>
                                    <th><font style="font-family: Verdana;font-size: small">Institute Name</font> <br>
                                    <th><font style="font-family: Verdana;font-size: small">Institute Email</font> <br>
                                    <th><font style="font-family: Verdana;font-size: small">Institute Location</font> <br>
                                     </tr>   
                           </thead>
                            <tbody>
                           <tr>
                           <?php 
                           $ins=mysqli_query($con,"select * from t_institute where i_name='$row[2]'");
                           while($row2=mysqli_fetch_array($ins))
                           {
                               echo "<td>$row2[0]</td>";
                               echo "<td>$row2[1]</td>";
                               echo "<td>$row2[2]</td>";
                               
                           }
                           ?>
                               
                               
                            </tbody>
                            
                       </table>
                       </td></tr>
             
                </tr>
                
                <tr>
                    
                <td><font style="font-family: Verdana;">Course Details</font></td>
                   <td colspan="3">
                       <table class="table table-hover">
                           <thead>
                               <tr>
                                    <th><font style="font-family: Verdana;font-size: small">Course Name</font> <br>
                                    <th><font style="font-family: Verdana;font-size: small">Course Duration</font> <br>
                                    <th><font style="font-family: Verdana;font-size: small">Course Amount</font> <br>
                                     </tr>   
                           </thead>
                            <tbody>
                           <tr>
                           <?php 
                           $cur=mysqli_query($con,"select * from t_course where c_name='$row[3]'");
                           while($row3=mysqli_fetch_array($cur))
                           {
                               echo "<td>$row3[0]</td>";
                               echo "<td>$row3[1]</td>";
                               echo "<td>$row3[2]</td>";
                               
                           }
                           ?>
                               
                               
                            </tbody>
                            
                       </table>
                       </td></tr>
             
                </tr>
             
                
               <tr>
                   <td><font style="font-family: Verdana;">Academic Qualification</font></td>
                   <td colspan="3">
                       <table class="table table-hover">
                           <thead>
                               <tr>
                                    <th><font style="font-family: Verdana;font-size: small">Exam</font> <br><font style="font-family: Verdana; font-size: small">passed</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Name of</font> <br><font style="font-family: Verdana;font-size: small">Board/University</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Year of</font> <br><font style="font-family: Verdana;font-size: small"> Passing</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Total</font><br><font style="font-family: Verdana;font-size: small"> Mark</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Mark</font> <br><font style="font-family: Verdana;font-size: small">Obtained</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Mark</font> <br><font style="font-family: Verdana;font-size: small">Percentage</font></th>
                              </tr>   
                           </thead>
                            <tbody>
                           <tr>
                               <td><?php echo "10th"; ?></td>
                               <td><?php echo $rs[11] ?></td>
                               <td><?php echo $rs[12] ?></td>
                               <td><?php echo $rs[13] ?></td>
                               <td><?php echo $rs[14] ?></td>
                               <td><?php echo $rs[15] ?></td>
                           </tr>
                           <tr>
                               <td><?php echo "12th"; ?> </td>
                               <td><?php echo $rs[16] ?></td>
                               <td><?php echo $rs[17] ?></td>
                               <td><?php echo $rs[18] ?></td>
                               <td><?php echo $rs[19] ?></td>
                               <td><?php echo $rs[20] ?></td>
                           </tr>
                           <?php 
                 }
                 
                ?>
                            </tbody>
                            
                       </table>
                       </td></tr>
                         
                 
                       </table></center>
                               </div>
                            </div>
            </div>
        <?php
              }
        ?>
             <center> <?php //echo "<a href='viewdoc.php?id=".$getid."'>View Documents </a>" ?> <br> <br>
             <input type="buttion" onclick="window.print()" class="toggle btn btn-primary" value="Print">
             </center>           
             
                  </form>
            </body>
</html>
