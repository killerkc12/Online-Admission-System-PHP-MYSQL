<?php
error_reporting(0);
session_start();
include 'config.php';

$q=mysqli_query($con,"select s_id from login where s_id='".$_SESSION['user']."'");
$n=  mysqli_fetch_assoc($q);
$s_id= $n['s_id'];

if(isset($_REQUEST['form']))
{
    //$s_id=$_SESSION['user'];
    $fname=$_REQUEST['fname'];
    $lname=$_REQUEST['lname'];
    $email=$s_id;
    $dob=$_REQUEST['dob'];
    $gender=$_REQUEST['gender'];
    $mob=$_REQUEST['mob'];
    $c=$_REQUEST['country'];
    $state=$_REQUEST['state'];
    $city=$_REQUEST['city'];
    $addr=$_REQUEST['addr'];
    $tb=$_REQUEST['tb'];
    $tyop=$_REQUEST['tyop'];
    $ttm=$_REQUEST['ttm'];
    $tom=$_REQUEST['tom'];
    $tp=$_REQUEST['tp'];
    $twb=$_REQUEST['twb'];
    $twyop=$_REQUEST['twyop'];
    $twtm=$_REQUEST['twtm'];
    $twom=$_REQUEST['twom'];
    $twp=$_REQUEST['twp'];
    
    $sql = "insert into user_data values(";
    $sql.= "'".$s_id."',";
    $sql.= "'".$fname."',";
    $sql.= "'".$lname."',";
    $sql.= "'".$email."',";
    $sql.= "'".$dob."',";
    $sql.= "'".$gender."',";
    $sql.= "'".$mob."',";
    $sql.= "'".$c."',";
    $sql.= "'".$state."',";
    $sql.= "'".$city."',";
    $sql.= "'".$addr."',";
    $sql.= "'".$tb."',";
    $sql.= "'".$tyop."',";
    $sql.= "'".$ttm."',";
    $sql.= "'".$tom."',";
    $sql.= "'".$tp."',";
    $sql.= "'".$twb."',";
    $sql.= "'".$twyop."',";
    $sql.= "'".$twtm."',";
    $sql.= "'".$twom."',";
    $sql.= "'".$twp."')";
    $query=mysqli_query($con,$sql);
    if($query)
    {
        echo "<script>alert('you filled a form successfully'); window.location.href='documents.php'</script>";
        //header("location:student_dash.php");
    }
    else
    {
        echo "<script>alert('error');</script>";
    }
}
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
        <!-- <link type="text/css" rel="stylesheet" href="css/admform.css"> -->
         <script language="javascript" type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
         <script language="javascript" type="text/javascript" src="jquery/jquery-ui.js"></script>
        <link href="jquery/jquery-ui.css" rel="stylesheet" type="text/css" />
         <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <script language="javascript" type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
        <script language="javascript" type="text/javascript" src="jquery/jquery-ui.js"></script>
        <link href="jquery/jquery-ui.css" rel="stylesheet" type="text/css" />
        
        <style type="text/css">
            .inpterr
            {
                border: 1px solid red;
                background: #FFCECE;

            }
            
            .inpterrc
            {
                border: 1px solid black;
                background: white;
            }
        </style>   
        
         
    </head>
     <body style="background-image:url('./images/inbg.jpg');">
<form>
<form id="form" action="form.php" method="post">
            <div style="background-color: blue;color: white;margin-left: 80px;margin-right: 80px;margin: 10px;">
           <font style="margin-left: 550px;font-size: 28px;font-family: vandana;"><b> STUDENT DETAILS</b></font>
           </div>
                 
             <div style="background-color: cyan;margin-left: 80px;padding: 20px 20px 20px 20px;margin-right: 80px;">
              <font style="font-family: Verdana;"><h4><b>Welcome, <?php echo $s_id;?></b></h4></font>
             <table class="frmtbl">
                <tr border="1" class="hdrow">
                 </tr>
                 <tr>
                   
                    <td colspan="2"> 
                    <input type="hidden" id="detid" name="detid"></td> 
                 </tr>        
                  <tr>
                      <td style="margin-left: 20px;"><font style="font-family: Verdana;">Enter First Name * : </font></td>
                      <td  style="padding-bottom: 1em;"><input type="text" id="fname" name="fname" required="true"></td>
                      <td><font style="font-family: Verdana;">Enter Last Name * : </font></td>
                      <td  style="padding-bottom: 1em;"><input type="text" id="lname" name="lname" required="true"></td>
                  </tr>
                  <tr>
                      <td><font style="font-family: Verdana;">Choose Date of Birth *  : </font></td>
                      <td  style="padding-bottom: 1em;">
                        <input type="text" id="in_dob" name="dob"  required="true">
                        <script type="text/javascript">
                            $(function() {
                            $("#in_dob").datepicker({ dateFormat: 'yy-mm-dd', yearRange:'-50:-18', changeYear:true, changeMonth:true});
                        });
                         </script>
                    </td>
                  </tr>
                  <tr> 
                      <td><font style="font-family: Verdana;">Choose Gender * : </font></td>
                      <td  style="padding-bottom: 1em;"><input type="radio" id="gender" name="gender" value="male" required="true" checked="checked">Male 
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" id="gender" name="gender" value="femaile" required="true">Female</td>
                      <td><font style="font-family: Verdana;">Enter Mobile Number *  : </font></td>
                      <td  style="padding-bottom: 1em;"><input type="number" id="mob" name="mob" onKeyPress="if(this.value.length>=10) return false;" required="true"></td>
                  </tr>
                  <tr>
                      <td style="padding-bottom: 1em;"><font style="font-family: Verdana;">Choose Country * : </font></td>
                      <td>
                      <select name="country" id="country" class="form-control" onchange="FetchState(this.value)"  required>
           			 	<option value="">Select Country</option>
          				<?php
          				$query = "SELECT * FROM countries Order by name";
          				//$result = $db->query($query);
          				$result = mysqli_query($con,$query);
                        if (mysqli_num_rows($result)>0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
                             }
                         }
                         ?> 
          				</select>
                      </td>
                      <td  style="padding-bottom: 1em;"><font style="font-family: Verdana;">Choose State *  : </font></td>
                      <td>
						<select name="state" id="state" class="form-control" onchange="FetchCity(this.value)"  required>
            <option>Select State</option>
          </select>
					</td>
                  </tr>
                  <tr>
                      <td  style="padding-bottom: 1em;"><font style="font-family: Verdana;">Choose City * : </font></td>
                      <td>
                      <select name="city" id="city" class="form-control">
            <option>Select City</option>
          </select>
                      </td>
                      <td><font style="font-family: Verdana;">Enter Address *  : </font></td>
                      <td  style="padding-bottom: 1em;"><textarea rows="" cols="" id="addr" name="addr" ></textarea></td>
                  </tr>
                  <tr><td colspan="7" align=center><font style="font-family:Verdana;size:25;color: red; margin: auto;"><b><br>Academic Qualification</b></font></td></tr><br><br>
                   <tr><td colspan="4">
                        <table class="table">
                           <thead>
                               <tr><br>
                                    <th><font style="font-family: Verdana;font-size: small">Exam passed</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Name of Board/University</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Year of Passing</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Total Mark</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Mark Obtained</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Percentage</font></th>
                              </tr>   
                           </thead>
                            <tbody>
                           <tr>
                               <td><?php echo "10th"; ?></td>
                               <td><input type="text" id="tb" name="tb" required="true"></td>
                               <td><input type="number" id="tyop" name="tyop" class="actab" onKeyPress="if(this.value.length>=4) return false;" required="true"></td>
                               <td><input type="number" id="ttm" name="ttm" class="actab" onkeypress="if(this.value.length>=3) return false;" required="true"></td>
                               <td><input type="number" id="tom" name="tom" id="tm1" class="actab"  onkeypress="if(this.value.length>=3) return false;" required="true"></td>
                               <td><input type="number" id="tp" name="tp" id="mo1" class="actab"  onkeypress="if(this.value.length>=4) return false;" required="true" readonly="readonly"></td>

                           </tr>
                           <tr>
                               <td><?php echo "12th"; ?> </td>
                               <td><input type="text" id="twb" name="twb" required="true"></td>
                               <td><input type="number" id="twyop" name="twyop" class="actab" onKeyPress="if(this.value.length>=4) return false;" required="true"></td>
                               <td><input type="number" id="twtm" name="twtm" class="actab" onKeyPress="if(this.value.length>=3) return false;" required="true"></td>
                               <td><input type="number" id="twom" name="twom" class="actab" onKeyPress="if(this.value.length>=3) return false;" required="true"></td>
                               <td><input type="number" id="twp" name="twp" class="actab" onKeyPress="if(this.value.length>=4) return false;" required="true" readonly="readonly"></td>
                           </tr>
                           
                            </tbody>
                       </table> 
                       
                           
                           <tr>
                                <td colspan="4">
                                   <center> <input type="submit" onclick="validate();" id="form" name="form" value="Submit" class="btn btn-danger"></center>
                                </td>
                           </tr>
    </table>
    </div>
            <br>
                       
                            
            <br>
</form>
</body>
 <script type="text/javascript">
  function FetchState(id){
    $('#state').html('');
    $('#city').html('<option>Select City</option>');
    $.ajax({
      type:'post',
      url: 'form1.php',
      data : { country_id : id},
      success : function(data){
         $('#state').html(data);
      }

    })
  }

  function FetchCity(id){ 
    $('#city').html('');
    $.ajax({
      type:'post',
      url: 'form1.php',
      data : { state_id : id},
      success : function(data){
         $('#city').html(data);
      }

    })
  }
</script>
<script>
    $(function(){
        $("#ttm,#tom").on("keydown keyup",sum);
        function sum(){
            $("#tp").val(Number($("#tom").val()) *100 / Number($("#ttm").val()));
        }
    });
</script>
<script>
    $(function(){
        $("#twtm,#twom").on("keydown keyup",sum);
        function sum(){
            $("#twp").val(Number($("#twom").val()) *100 / Number($("#twtm").val()));
        }
    });
</script>
</html>
