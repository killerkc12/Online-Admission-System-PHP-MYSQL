<?php

error_reporting(0);
session_start();
include 'config.php';

$txtname=$_REQUEST["txtname"];
$txteml=$_REQUEST["txteml"];
$txtpass=$_REQUEST["txtpass"];
$txtid=$_REQUEST["txteml"];
$cn = $_REQUEST["cname"];
$cd = $_REQUEST["cduration"];
$ca = $_REQUEST["camount"];
$ts=$_REQUEST['totalseats'];
$iname=$_REQUEST["iname"];
$iemail=$_REQUEST["iemail"];
$ilocation=$_REQUEST["ilocation"];
$institute=$_REQUEST["institute"];

$q=mysqli_query($con,"select ad_name from t_admin where ad_id='".$_SESSION['ad']."'");
$n=  mysqli_fetch_assoc($q);
$adname= $n['ad_name'];


if(isset($_REQUEST["isubmit"]))
{
    $sql ="insert into t_institute values(";
    $sql .="'" . $iname . "',";
    $sql .="'" . $iemail . "',";
    $sql .="'" . $ilocation . "')";
    
    $inst = mysqli_query($con, $sql);
    if($inst)
    {
        echo "<script>alert('institue added successfully');</script>";
    }
    else
    {
        echo "<script>alert('institue not added');</script>";
    }
}

if(isset($_REQUEST["csubmit"]))
{
    $sql1 = "insert into t_course values(";
    $sql1 .= "'" . $cn . "',";
    $sql1 .= "'" . $cd . "',";
    $sql1 .= "'" . $ca . "',";
    $sql1 .= "'" . $ts . "',";
    $sql1 .= "'" . $ts . "')";
    
    $crs = mysqli_query($con, $sql1);
    
    if($crs)
    {
        $sql5 ="insert into t_institute_course values(";
        $sql5.="'".$institute."',";
        $sql5.="'".$cn."')";
        
        $crs1 = mysqli_query($con,$sql5);
        
        if($crs1)
        {
            echo "<script>alert('course added successfully')</script>";
        }
        else
        {
            echo "<script>alert('course not added');</script>";
        }
    }
    
    
}


if(isset($_REQUEST["admcreate"]))
{
    
    $sql2  = "insert into t_admin values(";
    $sql2 .= "'" . $txtid . "',";
    $sql2 .= "'" . $txtname . "',";
    $sql2 .= "'" . $txtpass . "',";
    $sql2 .= "'" . $txteml . "')";
  
    mysqli_query($con, $sql2);
     
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
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
       <!--autosearch--> 
       
       <script type="text/javascript" src="jquery/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="jquery/jquery-ui-1.8.2.custom.min.js"></script> 
       <link href="css/css.css" rel="stylesheet" type="text/css" />
        
    <!--search table-->       
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readID.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectid(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
        
        
       <script>
            
            $(document).ready(function()
{
	$('#searchtb').keyup(function()
	{
		searchTable($(this).val());
	});
});

function searchTable(inputVal)
{
	var table = $('#tblData');
	table.find('tr').each(function(index, row)
	{
		var allCells = $(row).find('td');
		if(allCells.length > 0)
		{
			var found = false;
			allCells.each(function(index, td)
			{
				var regExp = new RegExp(inputVal, 'i');
				if(regExp.test($(td).text()))
				{
					found = true;
					return false;
				}
			});
			if(found == true)$(row).show();
				else $(row).hide();
		}
	});
}

            </script>
            
    <!--toggle
            <script>
            $(document).ready(function(){
                $("#appr").click(function(){
                    $("#disapp").hide();
                    $("#appr").hide();
                });
                //$("#disapp").click(function(){
                  //  $("p").show();
                //});
            });
            </script>
      -->  

            
   <!--auto search-->       
        
      <script type="text/javascript"> 

$(function() {

$("#search1").autocomplete({
source: "global_search.php",
minLength: 2,
select: function(event, ui) {
var getUrl = ui.item.id;
if(getUrl != '#') {
    
    var kk = $("#search1").val();
    $.ajax({
        type : "GET",
        cache : false,
        url : "admin.php",
        data : {
            srchk : kk
        },
        success : function(response) {
           // alert(response);
            $("#searhid1").val(response);
        }
    });
    
}
},

html: true, 
//    showname showomr submitmarks

});

});
</script>


<script type="text/javascript"> 

$(function() {

$("#search2").autocomplete({
source: "global_search.php",
minLength: 2,
select: function(event, ui) {
var getUrl = ui.item.id;
if(getUrl != '#') {
    
    var kk = $("#search2").val();
    $.ajax({
        type : "GET",
        cache : false,
        url : "admin.php",
        data : {
            srchk1 : kk
        },
        success : function(response) {
         // alert(response);
          $("#showomr").val(response);
        }
    });
    
}
},

html: true, 
//    showname showomr submitmarks

});

});
</script>

      


    </head>
    <body style="background-image:url(./images/inbg.jpg) ">
<?php  

include 'adminsession.php';

?>
      <!-- <form id="admin" action="admin.php" method="post"> -->
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                        <!-- <img src="images/cutm.jpg" width="100%" style="box-shadow: 0px 5px 5px #999999; "></img> -->
                  </div>
                 </div>    
             </div>
          
            <div class="container-fluid" id="dmid">    
                <div class="row">
                  <div class="col-sm-12">
                    
                      
                         <font style="color:white; font-family: Verdana;  font-size:20px;">
                <p align="justify"><?php echo "Welcome, $adname   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Administration Cell </b>"?>
                    
                    </p> </font>
                    
                  </div>
                 </div>    
             </div>
          
             <div class="container">
                    <ul class="nav nav-tabs" >
                        <li class="active"><a data-toggle="tab" href="#viewapp">Pending Applications</a></li>
                        <li><a data-toggle="tab" href="#viewconfirm">Confirm Students</a></li>
                        <li><a data-toggle="tab" href="#viewreject">Rejected Students</a></li>
                        <li><a data-toggle="tab" href="#adinstitute">Add Institute</a></li>
                        <li><a data-toggle="tab" href="#adcourse">Add Course</a></li>
                        <li><a data-toggle="tab" href="#adregister">Registered Students</a></li>
                        <li><a data-toggle="tab" href="#adadmin">Add New Manager</a></li>
                        <li><a  href="adlogout.php">Logout</a></li> 
                        <a href=reports.php><input type='button' value='Reports' name='reports' class='toggle btn btn-primary'></a>
<!--                         <li>  <input type="text" id="searchtb" name="searchtb" placeholder="Search" class="form-control"  
                           style="margin-top:5px;margin-left:250px;width:300px;"></li>-->
                    </ul>
                    <div class="tab-content">
                       <div id="viewapp" class="tab-pane fade in active">
                         
                          
                           <?php
	

		//$rs1 = mysqli_query($con,"select * from t_user_data where s_id in (select s_id from t_user where s_status='pending')");
		
           
		$rs1 = mysqli_query($con,"select * from t_user_course where status='pending'");
		echo '<table class="table table-striped" id="tblData">';
		echo "<thead>";
		echo "<tr>";
		echo "<th>APPLICATION ID</th>";
		echo "<th>FIRST NAME</th>";
		echo "<th>LAST NAME</th>";
		echo "<th>INSTITUTE NAME</th>";
		echo "<th>COURSE NAME</th>";
		//echo "<th>SIGNUP DATE</th>";
		echo "<tr>";
		echo "</thead>";
		echo "<tbody>";
		while($ar = mysqli_fetch_array($rs1))
		{
		    echo "<tr>";
		    
		    echo "<td><a href='viewform.php?id=".$ar[1]."'>" . $ar[0] . "</a></td>";
		    $query=mysqli_query($con,"select * from user_data where s_id='".$ar[1]."'");
		    
		    if($result=mysqli_fetch_array($query))
		    {
		        echo "<td>" . $result[1] . "</td>";
		        echo "<td>" . $result[2] . "</td>";
		    }
		    echo "<td>" . $ar[2] . "</td>";
		    $q1 = mysqli_query($con,"select * from t_course where c_name='".$ar[3]."'");
		    if($rs4 = mysqli_fetch_array($q1))
		    {
		        echo "<td>" . $ar[3] .  "   <b style='color:red;'>  [availale_seats='".$rs4[4]."']</b></td>";
		    }
                //echo "<td>" . $ar[6] . "</td>";
               
                    echo "<td><a href=confirm.php?id=".$ar[0]."&amp;eid=".$ar[1]."><input type='button' value='Confirm' name='confirm' class='toggle btn btn-primary'></a></td>";
                    echo "<td><a href=reject.php?id=".$ar[0]."&amp;eid=".$ar[1]." ><input type='button' value='Reject' name='reject' class='toggle btn btn-primary'></a></td>";
                }
               
                echo "</tbody>";
                echo "</table>";
	?>

             </div>
             
             
             
             <div id="viewconfirm" class="tab-pane fade">
                         
                          
                           <?php
	

		//$rs1 = mysqli_query($con,"select * from t_user_data where s_id in (select s_id from t_user where s_status='approved')");
		
           
		$rs1 = mysqli_query($con,"select * from t_user_course where status='approved'");
		echo '<table class="table table-striped" id="tblData">';
		echo "<thead>";
		echo "<tr>";
		echo "<th>APPLICATION ID</th>";
		echo "<th>FIRST NAME</th>";
		echo "<th>LAST NAME</th>";
		echo "<th>INSTITUTE NAME</th>";
		echo "<th>COURSE NAME</th>";
		//echo "<th>SIGNUP DATE</th>";
		echo "<tr>";
		echo "</thead>";
		echo "<tbody>";
		while($ar = mysqli_fetch_array($rs1))
		{
		    echo "<tr>";
		    
		    echo "<td><a href='viewform.php?id=".$ar[1]."'>" . $ar[0] . "</a></td>";
		    $query=mysqli_query($con,"select * from user_data where s_id='".$ar[1]."'");
		    
		    if($result=mysqli_fetch_array($query))
		    {
		        echo "<td>" . $result[1] . "</td>";
		        echo "<td>" . $result[2] . "</td>";
		    }
		    echo "<td>" . $ar[2] . "</td>";
		    echo "<td>" . $ar[3] . "</td>";
                //echo "<td>" . $ar[6] . "</td>";
                
                //echo "<td><a href=reject.php?id=".$ar[0]." ><input type='button' value='Reject' name='reject' class='toggle btn btn-primary'></a></td>";
                
		}
               
                echo "</tbody>";
                echo "</table>";
	?>

             </div>
             
             
             
             <div id="viewreject" class="tab-pane fade">
                         
                          
                           <?php
	

		//$rs1 = mysqli_query($con,"select * from t_user_data where s_id in (select s_id from t_user where s_status='rejected')");
		
           
		$rs1 = mysqli_query($con,"select * from t_user_course where status='rejected'");
		echo '<table class="table table-striped" id="tblData">';
		echo "<thead>";
		echo "<tr>";
		echo "<th>APPLICATION ID</th>";
		echo "<th>FIRST NAME</th>";
		echo "<th>LAST NAME</th>";
		echo "<th>INSTITUTE NAME</th>";
		echo "<th>COURSE NAME</th>";
		//echo "<th>SIGNUP DATE</th>";
		echo "<tr>";
		echo "</thead>";
		echo "<tbody>";
		while($ar = mysqli_fetch_array($rs1))
		{
		    echo "<tr>";
		    
		    echo "<td><a href='viewform.php?id=".$ar[1]."'>" . $ar[0] . "</a></td>";
		    $query=mysqli_query($con,"select * from user_data where s_id='".$ar[1]."'");
		    
		    if($result=mysqli_fetch_array($query))
		    {
		        echo "<td>" . $result[1] . "</td>";
		        echo "<td>" . $result[2] . "</td>";
		    }
		    echo "<td>" . $ar[2] . "</td>";
		    echo "<td>" . $ar[3] . "</td>";
                //echo "<td>" . $ar[6] . "</td>";
                
                //echo "<td><a href=confirm.php?id=".$ar[0]." ><input type='button' value='Confirm' name='confirm' class='toggle btn btn-primary'></a></td>";
                
		}
               
                echo "</tbody>";
                echo "</table>";
	?>

             </div>
             
             
             
             <div id="adinstitute" class="tab-pane fade">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-sm-12">
                       <br>
                      
                       </div>
                </div>
               
                
                
                <div class="row">
                   <div class="col-sm-12">
                       <div class="container">
                       <form action="admin.php" method="post">
                        <center> <div class="jumbotron" style="width:50%; box-shadow: -3px 3px 10px #999999;   margin-top:10px;">
                             <div class="row">
                                 <div class="col-sm-6">     
                                   <input type="text" name="iname" placeholder="Enter Institute Name" class="form-control" style="width:200px;" required="true"/><br>
                                        
                                </div> 
                                 <div class="col-sm-6">     
                                   <input type="text" name="iemail" placeholder="Enter Institute Email" class="form-control" style="width:200px;" required="true"/><br>
                                        
                                </div> 
                                 <div class="col-sm-6">     
                                   <input type="text" name="ilocation" placeholder="Enter Institute Location" class="form-control" style="width:200px;" required="true"/><br>
                                        
                                </div> 
                             </div><br>
                                  <input type="submit" value="Add" name="isubmit" class="toggle btn btn-primary"  />
                            </div></center>
                            </form>
                          </div>
                            </div>
                            <h3>Existing Institute</h3>
                            <?php
	
		
		
		$rs2 = mysqli_query($con,"select * from t_institute");
		
           
                echo '<table class="table table-striped">';
                echo "<thead>";
                echo "<tr>";
                echo "<th>INSTITUTE NAME</th>";
                echo "<th>INSTITUTE EMAIL</th>";
                echo "<th>INSTITUTE LOCATION</th>";
                echo "<tr>";
                echo "</thead>";
                echo "<tbody>";
		while($ar = mysqli_fetch_array($rs2))
		{
                       echo "<tr>";
                        echo "<td>" . $ar[0] . "</td>";
			echo "<td>" . $ar[1] . "</td>";
			echo "<td>" . $ar[2] . "</td>";
                      echo "<td><a href='editinstitute.php?id=$ar[0]'><input type=button value=EDIT name=edit class='toggle btn btn-primary'><a></td>";
                      echo "<td><a href='deleteinstitute.php?id=$ar[0]'><input type=button value=DELETE name=delete class='toggle btn btn-primary'><a></td>";
                      echo "</tr>";
		}
                
                echo "</tbody>";
                echo "</table>";
	?>
                                </div>
                            </div>
                    </div>
                    
                    
                     <div id="adcourse" class="tab-pane fade">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-sm-12">
                       <br>
                      
                       </div>
                </div>
               
                
                
                <div class="row">
                   <div class="col-sm-12">
                       <div class="container">
                       <form action="admin.php" method="post">
                        <center> <div class="jumbotron" style="width:50%; box-shadow: -3px 3px 10px #999999;   margin-top:10px;">
                             <div class="row">
                                
                                <div class="col-sm-6">     
                                   <select  name='institute' class='form-control' required>
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
                                        
                                </div> 
                                 <div class="col-sm-6">     
                                   <input type="text" name="cname" placeholder="Enter Course Name" class="form-control" style="width:200px;" required="true"/><br>
                                        
                                </div> 
                                 <div class="col-sm-6">     
                                   <input type="text" name="cduration" placeholder="Enter Course Duration" class="form-control" style="width:200px;" required="true"/><br>
                                        
                                </div> 
                                 <div class="col-sm-6">     
                                   <input type="text" name="camount" placeholder="Enter Course Amount" class="form-control" style="width:200px;" required="true"/><br>
                                        
                                </div> 
                                <div class="col-sm-6">     
                                   <input type="text" name="totalseats" placeholder="Enter Total Seats" class="form-control" style="width:200px;" required="true"/><br>
                                        
                                </div>
                             </div><br>
                                  <input type="submit" value="Submit" name="csubmit" class="toggle btn btn-primary"  />
                            </div></center>
                            </form>
                          </div>
                            </div>
                            <h3>Existing Courses</h3>
                            
                            <?php
	
		
		
		$rs2 = mysqli_query($con,"select * from t_course");
		
           
                echo '<table class="table table-striped">';
                echo "<thead>";
                echo "<tr>";
                echo "<th>INSTITUTE NAME</th>";
                echo "<th>COURSE NAME</th>";
                echo "<th>COURSE DURATION</th>";
                echo "<th>COURSE AMOUNT</th>";
                echo "<th>TOTAL SEATS</th>";
                echo "<th>AVAILABLE SEATS</th>";
                echo "<tr>";
                echo "</thead>";
                echo "<tbody>";
		while($ar = mysqli_fetch_array($rs2))
		{
            echo "<tr>";
            $rs3 = mysqli_query($con,"select * from t_institute_course where c_name='".$ar[0]."'");
            if($ar1 = mysqli_fetch_array($rs3))
            {
                echo "<td>" . $ar1[0] . "</td>";
            }
            echo "<td>" . $ar[0] . "</td>";
			echo "<td>" . $ar[1] . "</td>";
			echo "<td>" . $ar[2] . "</td>";
			echo "<td>" . $ar[3] . "</td>";
			echo "<td>" . $ar[4] . "</td>";
			echo "<td><a href='editcourse.php?id=$ar[0]'><input type=button value=EDIT name=edit class='toggle btn btn-primary'><a></td>";
			echo "<td><a href='deletecourse.php?id=$ar[0]'><input type=button value=DELETE name=delete class='toggle btn btn-primary'><a></td>";
			 echo "</tr>";
		}
                
                echo "</tbody>";
                echo "</table>";
	?>
                                </div>
                            </div>
                    </div>
                    
                        
                        
                        <div id="adregister" class="tab-pane fade">
                         
                          
                           <?php
	

		        $rs1 = mysqli_query($con,"select * from user_data");
                echo '<table class="table table-striped" id="tblData">';
                echo "<thead>";
                echo "<tr>";
                echo "<th>STUDENT ID</th>";
                echo "<th>FIRST NAME</th>";
                echo "<th>LAST NAME</th>";
                echo "<th>EMAIL</th>";
                echo "<th>DATE OF BIRTH</th>";
                echo "<th>GENDER</th>";
                echo "<th>MOB. NO.</th>";
                //echo "<th>SIGNUP DATE</th>";
                echo "<tr>";
                echo "</thead>";
                echo "<tbody>";
		        while($ar = mysqli_fetch_array($rs1))
                {
               echo "<tr>";
              
               echo "<td><a href='viewform.php?id=".$ar[0]."'>" . $ar[0] . "</a></td>";
               echo "<td>" . $ar[1] . "</td>";
               echo "<td>" . $ar[2] . "</td>";
               echo "<td>" . $ar[3] . "</td>";
               echo "<td>" . $ar[4] . "</td>";
               echo "<td>" . $ar[5] . "</td>";
               echo "<td>" . $ar[6] . "</td>";
                
                //echo "<td>" . $ar[6] . "</td>";
                echo "<td><a href='editstudent.php?id=$ar[0]'><input type=button value=EDIT name=edit class='toggle btn btn-primary'><a></td>";
                echo "<td><a href='deletestudent.php?id=$ar[0]'><input type=button value=DELETE name=delete class='toggle btn btn-primary'><a></td>";

		}
               
                echo "</tbody>";
                echo "</table>";
	?>

             </div>
                        
             
             

                        
                                       
            
                        
                         <div id="adadmin" class="tab-pane fade">
                        <div class="row">
                                <div class="col-sm-12"> 
                                   
                                            <h3>New Manager Details</h3>
                                            <input type="text" id="txtname"  name="txtname" class="form-control" style="width:200px;margin-left:32px;" placeholder="Name"><br><br>
                                            <input type="text" id="txteml"  name="txteml" class="form-control" style="width:200px;margin-left:32px;" placeholder="Email ID"><br><br>
                                            <input type="text" id="txtpass"  name="txtpass" class="form-control" style="width:200px;margin-left:32px;" placeholder="Password"><br>
                                            <input type="submit" value="Create" name="admcreate" class="toggle btn btn-primary" style="margin-left:102px;"/> <br>
                                            <hr><hr>                          
                                            <h3>Existing  Managers</h3>
                                                
                                             <?php
	
		
		
		$rs2 = mysqli_query($con,"select * from t_admin");
		
           
                echo '<table class="table table-striped">';
                echo "<thead>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>NAME</th>";
                echo "<th>EMAIL ID</th>";
                
                echo "<tr>";
                echo "</thead>";
                echo "<tbody>";
		while($ar = mysqli_fetch_array($rs2))
		{
                       echo "<tr>";
                        echo "<td>" . $ar[0] . "</td>";
			echo "<td>" . $ar[1] . "</td>";
                        echo "<td>" . $ar[3] . "</td>";
			
                      echo "</tr>";
		}
                
                echo "</tbody>";
                echo "</table>";
	?>
                   


                            <input type="hidden" id="txtid"  name="txtid" >
                           <input type="hidden" id="txtpwd" name="txtpwd">

                           
                                </div>
                                </div>    
                            </div>
                        </div>
                  </div>    
           <!--   </form> -->                 
    </body>
</html>
