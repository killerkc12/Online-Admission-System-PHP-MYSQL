<?php
    error_reporting(0);
$getid= $_GET["id"];
include 'config.php';


$q=mysqli_query($con,"select s_name from user_data where s_id='$getid'");
$n=  mysqli_fetch_assoc($q);
$stname= $n['s_name'];
$id=$_SESSION['user'];


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
                    
                    $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='$getid'");
                        
                    
                    
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
                 $sql = mysqli_query($con, "select * from user_data where s_id='$getid'");
                 while($rs = mysqli_fetch_array($sql))
                 {
                 
                 ?>
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Student's First Name : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $rs[1];?> </td>
                 </tr>
                 
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Student's Last Name : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $rs[2];?> </td>
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
                    <td> <font style="font-family: Verdana;">Date of Birth : </font>
                    <td colspan="3"><?php echo $rs[4] ?></td>       
                    
                </tr>
                  
                <tr>
                    <td> <font style="font-family: Verdana;">Gender : </font>
                    <td colspan="3"><?php echo $rs[5] ?></td>       
                    
                </tr>
                  
                  <tr>
                    <td> <font style="font-family: Verdana;">Country : </font>
                    <?php 
                    $c=mysqli_query($con, "select name from countries where id='".$rs[7]."'");
                    $c1=mysqli_fetch_assoc($c);
                    ?>
                    <td colspan="3"><?php echo $c1['name'] ?></td>       
                    
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">State : </font>
                    <?php 
                    $c=mysqli_query($con, "select name from states where id='".$rs[8]."'");
                    $c1=mysqli_fetch_assoc($c);
                    ?>
                    <td colspan="3"><?php echo $c1['name'] ?></td>       
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">City : </font>
                    <?php 
                    $c=mysqli_query($con, "select name from cities where id='".$rs[8]."'");
                    $c1=mysqli_fetch_assoc($c);
                    ?>
                    <td colspan="3"><?php echo $c1['name'] ?></td>       
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Address : </font>
                    <td colspan="3"><?php echo $rs[10] ?></td>       
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
                           
                            </tbody>
                       </table>
                       
                         
                 
                       </table></center>
                               </div>
                            </div>
            </div>
        <?php
              }
        ?>
             <center> <?php echo "<a href='viewdoc.php?id=".$getid."'>View Documents </a>" ?> <br> <br>
             <input type="buttion" onclick="window.print()" class="toggle btn btn-primary" value="Print">
             </center>           
             
                  </form>
            </body>
</html>
