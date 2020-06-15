<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
       <!--autosearch--> 
       
       <script type="text/javascript" src="jquery/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="jquery/jquery-ui-1.8.2.custom.min.js"></script> 
       <link href="css/css.css" rel="stylesheet" type="text/css" />
        
</head>
<body style="background-image:url('./images/inbg.jpg');">
<div id="dmid" class="container-fluid">  
                 <div class="row">
                    <div class="col-sm-12">
                    	<font style="color:white;font-family: Verdana; width:100%; font-size:30px;">
                    	<span><a href="student_dash.php"><input type="button" value="BACK" class="btn btn-danger"></a></span></font>
                        <font style="color:white; margin-left:520px; font-family: Verdana; width:100%; font-size:30px;">
                        <b>Courses Details</b> </font>
                      </div>
                 </div>
                
             </div>
              <div style="border-radius: 6px;padding: 20px 20px 20px 20px;">
                     
                     <?php
                     error_reporting(0);
                     session_start();
                     
                     $id= $_REQUEST["id"];
                     echo "<h3 style='font-style: italic;color:red;'>Institute Name : ".$id." </h3><br>";
                     //$session_id=$_REQUEST["session_id"];
                     include 'config.php';
                     
                     $rs1 = mysqli_query($con,"select * from t_course where c_name in(select c_name from t_institute_course where i_name='$id')");
                     
                     
                     echo '<table class="table table-striped" id="tblData">';
                     echo "<thead>";
                     echo "<tr>";
                     echo "<th>COURSE NAME</th>";
                     echo "<th>COURSE DURATION</th>";
                     echo "<th>COURSE AMOUNT</th>";
                     echo "<th>TOTAL SEATS</th>"; 
                     echo "<th>AVAILABLE SEATS</th>";
                     echo "<tr>";
                     echo "</thead>";
                     echo "<tbody>";
                     while($ar = mysqli_fetch_array($rs1))
                     {
                         if($ar[4]>0)
                         {
                             echo "<tr>";
                             echo "<td>" . $ar[0] . "</td>";
                             echo "<td>" . $ar[1] . "</td>";
                             echo "<td>" . $ar[2] . "</td>";
                             echo "<td>" . $ar[3] . "</td>";
                             echo "<td>" . $ar[4] . "</td>";
                             echo "<td><a href=applycourse.php?iname=".$id."&amp;cname=".$ar[0]."><input type='button' value='Apply Course' name='applycourse' class='toggle btn btn-primary'></a></td>";
                         }
                        
                     }
                     
                     echo "</tbody>";
                     echo "</table>";
                     ?>
            </div>
    </body>
</html>
