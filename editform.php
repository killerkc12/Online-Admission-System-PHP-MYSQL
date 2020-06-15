<?php
    session_start();
    error_reporting(0);

    include 'config.php';
    
    $iname=$_REQUEST["iname"];
    $cname=$_REQUEST["cname"];
    $nob1=$_REQUEST["nob1"];
    $yop1=$_REQUEST["yop1"];
    $tm1=$_REQUEST["tm1"];
    $mo1 =$_REQUEST["mo1"];
    
    $nob2  =$_REQUEST["nob2"];
    $yop2=$_REQUEST["yop2"];
    $tm2=$_REQUEST["tm2"];
    $mo2  =$_REQUEST["mo2"];
    
    if(isset($_REQUEST["frmupdate"]))
    {
        $sql ="update t_user set i_name='$iname' , c_name='$cname', s_ten_board='$nob1', s_ten_yop='$yop1',";
        $sql.="s_ten_tm='$tm1', s_ten_mo='$mo1', s_twl_board=' $nob2 ', s_twl_yop='$yop2', s_twl_tm='$tm2',";
        $sql.="s_twl_mo='$mo2' where s_id='".$_SESSION['user']."'";

        $update=mysqli_query($con, $sql);
    if($update)
    {
        
        echo "<script type='text/javascript'>alert('Details Uploaded !!');</script>";
        header('location:student_dash.php');
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
        <form id="edform" action="editform.php" method="post">
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
                        <b>EDIT FORM</b> </font>
                      </div>
                 </div>
                
             </div>
                       
                       
            <table class="frmtbl">
                <?php
            
                    $result = mysqli_query($con,"SELECT * FROM t_user WHERE s_id='".$_SESSION['user']."'");

                            while($row = mysqli_fetch_array($result))
                              {
                        
                ?>
                <tr border="1" class="hdrow">
                    
                 </tr>       
                 
                  <tr>
                          <td> <font style="font-family: Verdana;color:red"><h4>Welcome, <?php echo $stname;?></h4> </font> </td>
                    <td colspan="2"> 
                        <input type="hidden" id="detid" name="detid"></td>
                        
                 
                  </tr>
                  
                  <tr>
                           <tr>
                               <td align="center"><font style="font-family: Verdana;">Select Institute : </font></td>
                               <td colspan="3">
                               <select  name='iname' class='form-control' required>
                               <option value=<?php echo $row['i_name'];?>><?php echo $row["i_name"]?></option>
                               <?php 
                               $crs=mysqli_query($con, "select * from t_institute");
                               while($row1=mysqli_fetch_array($crs))
                               {
                                   echo "<option value='".$row1[0]."'>".$row1[0]."</option>"; 
                               }
                               mysqli
                               ?>
                                    </select>
                               </td>
                           </tr>
                           
                           <tr>
                               <td align="center"><font style="font-family: Verdana;">Select Course : </font></td>
                               <td colspan="3">
                               <select name='cname'  class='form-control' required>
                               <option value=<?php echo $row["c_name"];?>><?php echo $row["c_name"]?></option>
                               <?php 
                               $crs=mysqli_query($con, "select * from t_course");
                               while($row2=mysqli_fetch_array($crs))
                               {
                                   echo "<option value='".$row2[0]."'>".$row2[0]."</option>"; 
                               }
                               
                               ?>
                                    </select>
                               </td>
                           </tr>
                          
                          <tr>
                          <td conspan=2>    </td>
                          </tr>
                           
              
                          
                   <tr><td colspan="7" align=center><font style="font-family:Verdana;size:25;"><b><br>Academic Qualification</b></font></td></tr><br><br>
                   <tr><td colspan="3">
                        <table class="table">
                           <thead>
                               <tr><br>
                                    <th><font style="font-family: Verdana;font-size: small">Exam passed</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Name of Board/University</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Year of Passing</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Total Mark</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Mark Obtained</font></th>
                              </tr>   
                           </thead>
                            <tbody>
                           <tr>
                               <td><?php echo "10th"; ?></td>
                               <td><input type="text" id="nob1" name="nob1" value="<?php echo $row["s_ten_board"];?>" required="true"></td>
                               <td><input type="text" id="yop1" name="yop1" class="actab" value="<?php echo $row["s_ten_yop"];?>" required="true" maxlength="4"></td>
                               <td><input type="text" id="tm1" name="tm1" id="tm1" class="actab" value="<?php echo $row["s_ten_tm"];?>" required="true" maxlength="4"></td>
                               <td><input type="text" id="mo1" name="mo1" id="mo1" class="actab" value="<?php echo $row["s_ten_mo"];?>" onchange="add()" required="true" maxlength="4"></td>

                           </tr>
                           <tr>
                               <td><?php echo "12th"; ?> </td>
                               <td><input type="text" id="nob2" name="nob2" value="<?php echo $row["s_twl_board"];?>" required="true"></td>
                               <td><input type="text" id="yop2" name="yop2" value="<?php echo $row["s_twl_yop"];?>" class="actab" required="true"  maxlength="4"></td>
                               <td><input type="text" id="tm2" name="tm2" id="tm2" value="<?php echo $row["s_twl_tm"];?>" class="actab" required="true" maxlength="4"></td>
                               <td><input type="text" id="mo2" name="mo2" id="tm2" value="<?php echo $row["s_twl_mo"];?>" class="actab" required="true" maxlength="4"></td>
                           </tr>
                           
                            </tbody>
                       </table> 
                       
                           
                           <tr>
                                <td colspan="4">
                                   <center> <input type="submit" onclick="validate();" id="frmupdate" name="frmupdate" value="UPDATE"></center>
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
