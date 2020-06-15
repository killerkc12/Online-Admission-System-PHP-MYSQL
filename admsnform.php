<?php
    session_start();
    error_reporting(0);

    include 'config.php';
    
    $detid=$_REQUEST["detid"]; 
    $iname=$_REQUEST["iname"];
    $cname=$_REQUEST["cname"];
 
    if(isset($_REQUEST["apply"]))
    {
        $q1=mysqli_query($con,"select * from t_course where c_name='$cname'");
        if($rs=mysqli_fetch_array($q1))
        {
            if($rs['c_available_seats']>0)
            {
              if($detid== "")
                $detid = DetCode();  
                $sql1  = "insert into t_user_course values(";
                $sql1 .= "'" . $detid . "',";
                $sql1 .= "'" . $_SESSION['user'] ."',";
                $sql1 .= "'" . $iname ."',";
                $sql1 .= "'".$cname."',";
                $sql1 .= "'pending')";
                
                $form1=mysqli_query($con, $sql1);
                
                if($form1)
                {
                    echo "<script>alert('Applied Course Successfully')</script>";
                }
                else
                {
                    echo "<script>alert('error')</script>";
                }
                
                      
            }
            else 
            {
                echo "<script>alert('no seats available for this course');</script>";
            }
        }
        
                     
    }
    
    
function DetCode()
{
    include 'config.php';
      $rs  = mysqli_query($con,"select CONCAT('DE',LPAD(RIGHT(ifnull(max(s_detid),'DE00000000'),8) + 1,8,'0')) from t_user_course");
      return mysqli_fetch_array($rs)[0];
}

$q=mysqli_query($con,"select s_first_name from user_data where s_id='".$_SESSION['user']."'");
$n=  mysqli_fetch_assoc($q);
$stname= $n['s_first_name'];



 if (!isset($_SESSION['user']))
{
        echo "<br><h2>You are not Logged On Please Login to Access this Page</div></h2>";
        echo "<a href=index.php><h3 align=center>Click Here to Login</h3></a>";
        exit();
}



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
        <form id="adform" name="adform" action="admsnform.php" method="post">
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                      <!--   <img src="images/cutm.jpg" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img> -->
                  </div>
                 </div>    
             </div>
            <div id="dmid" class="container-fluid">  
                 <div class="row">
                    <div class="col-sm-12">
                    	<font style="color:white;font-family: Verdana; width:100%; font-size:20px;">
                    	<span><a href="student_dash.php"><input type="button" value="BACK TO STUDENT DASHBOARD" class="btn btn-danger"></a></span></font>
                        <font style="color:white; margin-left:200px; font-family: Verdana; width:100%; font-size:20px;">
                        <b>Existing Applied Courses</b> </font>
                      </div>
                 </div>
                
             </div>
            
            <table class="frmtbl">
                
                <tr border="1" class="hdrow">
                    
                 </tr>       
                 
                  <tr>
                          <td> <font style="font-family: Verdana;color:red"><h4>Welcome, <?php echo $stname;?></h4> </font> </td>
                    <td colspan="2"> 
                        <input type="hidden" id="detid" name="detid"></td>
                        
                 
                  </tr>
                  <!-- 
                  <tr>
                           <tr>
                               <td align="center"><font style="font-family: Verdana;">Select Institute : </font></td>
                               <td colspan="3">
                               <select  name='iname' id='iname'  onchange="FetchCourse(this.value)" class='form-control' required>
                               <option value="">--Select the Institude--</option>
                               <?php 
                               $crs=mysqli_query($con, "select * from t_institute");
                               while($row=mysqli_fetch_array($crs))
                               {
                                   echo "<option value='".$row[0]."'>".$row[0]."</option>"; 
                               }
                               mysqli
                               ?>
                                    </select>
                                    <input type=hidden id=result name=result readonly="readonly">
                               </td>
                           </tr>
                           
                           <tr>
                               <td align="center"><font style="font-family: Verdana;">Select Course : </font></td>
                               <td colspan="3">
                               <select name='cname' id='cname'  class='form-control' required>
                               <option value="">--Select the Course--</option>
                               
                                    </select>
                               </td>
                           </tr>
                          
                          <tr>
                          <td conspan=2>    </td>
                          </tr>
                           
                         
                           <tr>
                                <td colspan="4"><br>
                                   <center> <input type="submit" id="apply" name="apply" value="Apply" class="btn btn-danger"></center>
                                </td>
                           </tr>
                            -->
                       </table>
                 
                  </form>
                  
                  
                  
                
                <div class="row">
                   <div class="col-sm-12">
                       <div class="container">
                        <center> 
                             <div class="row">
                                <div class="col-sm-6">  
                               
                                </div> 
                             </div><br>
                            </center>
                         <!--    <h3 style="color: red">Existing Applied Courses : </h3> -->
                            <?php
	
           
                echo '<table class="table table-striped">';
                echo "<thead>";
                echo "<tr>";
                echo "<th>FORM ID</th>";
                echo "<th>INSTITUDE NAME</th>";
                echo "<th>COURSE NAME</th>";
                echo "<th>COURSE AMOUNT</th>";
                echo "<th>STATUS</th>";
                
                echo "<tr>";
                echo "</thead>";
                echo "<tbody>";
                $rs2 = mysqli_query($con,"select * from t_user_course where s_id='".$_SESSION['user']."'");
                
            		while($ar = mysqli_fetch_array($rs2))
            		{
                        echo "<tr>";
                        echo "<td>" . $ar[0] . "</td>";
                        echo "<td>".$ar[2]."</td>";
                        echo "<td>".$ar[3]."</td>";
                        $rs3 = mysqli_query($con,"select c_amount from t_course where c_name='".$ar[3]."'");
                        $n = mysqli_fetch_assoc($rs3);
                        echo "<td>".$n["c_amount"]. "</td>";


                        echo "<td>" . $ar[4] . "</td>";
                        if($ar[4]=='pending')
                        {
                            echo "<td><a href=deleteform.php?id=".$ar[0]." ><input type='button' value='DELETE' name='delete' class='toggle btn btn-primary'></a></td>";
                        }
                        if($ar[4]=='approved')
                        {
//                             echo "<td><a href=php-paytm/index.php?s_detid=".$ar[0]."&amp;s_id=".$ar[1]."&amp;i_name=".$ar[2]."&amp;c_name=".$ar[3]."&amp;c_amount=".$n['c_amount']." ><input type='button' value='Make Payment' name='payment' class='toggle btn btn-primary'></a></td>";
                            echo "<td><a href=printform.php?id=".$ar[0]." ><input type='button' value='Print Form' name='print' class='toggle btn btn-primary'></a></td>";
                            $msg = "Take the Print of the Form and Visit the <b> $ar[2] instutute </b> and Submit the form and pay the fee amount then <b> $ar[3] course </b> will start shortly.";
                        }
                        if($ar[4]=='payment_done')
                        {
                            //
                        }
                        if($ar[4]=='rejected')
                        {
                            $sql3 = mysqli_query($con, "select * from t_rejected where s_detid='$ar[0]'");
                            if($rs5=mysqli_fetch_array($sql3))
                            {
                                echo "<td>(".$rs5[1].")</td>";
                            }
                        }
                      echo "</tr>";
		          }
                
                echo "</tbody>";
                echo "</table>";
                echo "<p style='color:red;'>Note : ".$msg."</p>";
	?>
    
                                </div>
                            </div>
                    </div>
                        
                       
    
                  
                  
                  
                  
            </body>
            <script type="text/javascript">
            function FetchCourse(id){
                $('#cname').html('');
                $('#city').html('<option>Select City</option>');
                $.ajax({
                  type:'post',
                  url: 'admissionreports1.php',
                  data : { institute_name : id},
                  success : function(data){
                     $('#cname').html(data);
                  }

                })
              }
            			
            </script>
</html>
