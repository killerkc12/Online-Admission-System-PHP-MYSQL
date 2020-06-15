<?php

error_reporting(0);
session_start();

include 'config.php';

$q=mysqli_query($con,"select s_first_name from user_data where s_id='".$_SESSION['user']."'");
$n=  mysqli_fetch_assoc($q);
$sfname= $n['s_first_name'];

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

      <form id="student_dash" action="student_dash.php" method="post">
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                      
                  </div>
                 </div>    
             </div>
          
            <div class="container-fluid" id="dmid">    
                <div class="row">
                  <div class="col-sm-12">
                    
                      
                         <font style="color:white; font-family: Verdana;  font-size:20px;">
                <p align="justify"><?php echo "Welcome, $sfname   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Student Cell </b>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b><a href='admsnform.php'><input type='button' value='Existing Applied Courses' class='toggle btn btn-danger'></a></b>"


                    ?></p> </font>
                  </div>
                 </div>    
             </div>
          
             <div class="container">
                    <ul class="nav nav-tabs" >

                        <li class="active"><a data-toggle="tab" href="#viewinstitute">View Institute</a></li>
                        <li><a  href="studlogout.php">Logout</a></li> 
                    </ul>
                    <div class="tab-content">
                       <div id="viewinstitute" class="tab-pane fade in active">
                         
                          
                           <?php
	

		$rs1 = mysqli_query($con,"select * from t_institute");
		
           
                echo '<table class="table table-striped" id="tblData">';
                echo "<thead>";
                echo "<tr>";
                echo "<th>INSTITUTE NAME</th>";
                echo "<th>INSTITUTE EMAIL</th>";
                echo "<th>INSTITUTE LOCATION</th>";
                echo "<tr>";
                echo "</thead>";
                echo "<tbody>";
		while($ar = mysqli_fetch_array($rs1))
                {
               echo "<tr>";
              
               echo "<td>" . $ar[0] . "</td>";
               echo "<td>" . $ar[1] . "</td>";
                echo "<td>" . $ar[2] . "</td>";
               
                echo "<td><a href=viewcourses.php?id=".$ar[0]." ><input type='button' value='View Courses' name='viewcourse' class='toggle btn btn-primary'></a></td>";
                
                
		}
               
                echo "</tbody>";
                echo "</table>";
	?>

             </div>
             
             
             


                        
             
                      
            <div id="admarks" class="tab-pane fade">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-sm-12">
                       <br>
                      
                       </div>
                </div>
                                         


                        
                         <div id="adadmin" class="tab-pane fade">
                        <div class="row">
                                <div class="col-sm-12"> 
                                   
                                            <h3>New Manager Details</h3>
                                            <input type="text" id="txtname"  name="txtname" class="form-control" style="width:200px;margin-left:32px;" placeholder="Name"><br><br>
                                            <input type="text" id="txteml"  name="txteml" class="form-control" style="width:200px;margin-left:32px;" placeholder="Email ID"><br>
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
             </form>                 
    </body>
</html>