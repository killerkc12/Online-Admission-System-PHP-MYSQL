<?php

error_reporting(0);
session_start();

include 'config.php';

$q=mysqli_query($con,"select ad_name from t_admin where ad_id='".$_SESSION['ad']."'");
$n=  mysqli_fetch_assoc($q);
$adname= $n['ad_name'];
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

            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                  </div>
                 </div>    
             </div>
          
            <div class="container-fluid" id="dmid">    
                <div class="row">
                    <div class="col-sm-12">
                    	<font style="color:white;font-family: Verdana; width:100%; font-size:20px;">
                    	<span><a href="admin.php"><input type="button" value="BACK" class="btn btn-danger"></a></span></font>
                        <font style="color:white; margin-left:500px; font-family: Verdana; width:100%; font-size:20px;">
                        <b>All REPORTS</b> </font>
                      </div>
                 </div>    
             </div>
          
             <div class="container">
                    <ul class="nav nav-tabs" >
						<li><a href="studentreports.php"><input type='button' value='Register Students Reports' name='student' class='toggle btn btn-primary'></a></li>
                        <li><a href="institutereports.php"><input type='button' value='Institutes Reports' name='institute' class='toggle btn btn-primary'></a></li>
                        <li><a href="coursereports.php"><input type='button' value='Course Reports' name='course' class='toggle btn btn-primary'></a></li>
                        <li><a href="admissionreports.php"><input type='button' value='Admissions Repots' name='admission' class='toggle btn btn-primary'></a></li>
                    </ul>
                  </div>                 
    </body>
</html>