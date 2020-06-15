<?php
error_reporting(0);
session_start();
include 'config.php';

$id=$_GET['id'];

if(isset($_REQUEST['update']))
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
    
    $sql = "update user_data set s_first_name='".$fname."',";
    $sql.= "s_last_name='".$lname."',";
    $sql.= "s_email='".$email."',";
    $sql.= "s_dob='".$dob."',";
    $sql.= "s_gender='".$gender."',";
    $sql.= "s_mob='".$mob."',";
    $sql.= "s_country='".$c."',";
    $sql.= "s_state='".$state."',";
    $sql.= "s_city='".$city."',";
    $sql.= "s_addr='".$addr."',";
    $sql.= "s_ten_board='".$tb."',";
    $sql.= "s_ten_yop='".$tyop."',";
    $sql.= "s_ten_tm='".$ttm."',";
    $sql.= "s_ten_mo='".$tom."',";
    $sql.= "s_ten_per='".$tp."',";
    $sql.= "s_twl_board='".$twb."',";
    $sql.= "s_twl_yop='".$twyop."',";
    $sql.= "s_twl_tm='".$twtm."',";
    $sql.= "s_twl_mo='".$twom."',";
    $sql.= "s_twl_per='".$twp."' where s_id='".$_GET['id']."'";
    
    
    $query=mysqli_query($con,$sql);
    if($query)
    {
        echo "<script>alert('you updated student details successfully');</script>";
        //header("location:student_dash.php");
        //header('location:documents.php');
    }
    else
    {
        echo "<script>alert('error in updating');</script>";
    }
}
include 'adminsession.php';

$q1=mysqli_query($con,"select * from user_data where s_id='".$_GET['id']."'");
while($r1=mysqli_fetch_array($q1))
{

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
       
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
<form id="form" action="editstudent.php" method="post">
           
           <div style="background-color: blue;color: white;margin-left: 80px;margin-right: 80px;margin: 10px;">
           <font style="margin-left: 550px;font-size: 28px;font-family: vandana;"><b>EDIT STUDENT DETAILS</b></font>
           </div>
                 
             <div style="background-color: cyan;margin-left: 80px;padding: 20px 20px 20px 20px;margin-right: 80px;">
              <font style="font-family: Verdana;"><h4><b>Welcome, <?php echo $s_id;?></b></h4></font>
             <table class="frmtbl">
                <tr border="1" >
                 </tr>
                 <tr>
                    <td> </td>
                    <td colspan="2"> 
                    <input type="hidden" id="detid" name="detid"></td> 
                 </tr>        
                  <tr>
                      <td style="margin-left: 20px;"><font style="font-family: Verdana;">Enter First Name * : </font></td>
                      <td  style="padding-bottom: 1em;"><input type="text" id="fname" name="fname" value="<?php echo $r1[1] ?>" required="true"></td>
                      <td><font style="font-family: Verdana;padding-left: 20px;">Enter Last Name * : </font></td>
                      <td  style="padding-bottom: 1em;"><input type="text" id="lname" name="lname" value="<?php echo $r1[2] ?>" required="true"></td>
                  </tr>
                  <tr>
                      <td><font style="font-family: Verdana;">Choose Date of Birth *  : </font></td>
                      <td  style="padding-bottom: 1em;">
                        <input type="text" id="in_dob" name="dob" value="<?php echo $r1[4] ?>"  required="true">
                        <script type="text/javascript">
                            $(function() {
                            $("#in_dob").datepicker({ dateFormat: 'yy-mm-dd', yearRange:'-50:-18', changeYear:true, changeMonth:true});
                        });
                         </script>
                    </td>
                  </tr>
                  <tr> 
                      <td><font style="font-family: Verdana;">Choose Gender * : </font></td>
                      <td  style="padding-bottom: 1em;"><input type="radio" id="gender" name="gender" value="male" required="true" <?php if($r1[5]=='male') { ?> checked="checked" <?php }?>>Male 
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" id="gender" name="gender" value="female"  <?php if($r1[5]=='female') { ?> checked="checked" <?php }?>>Female</td>
                      <td><font style="font-family: Verdana;padding-left: 20px;">Enter Mobile Number *  : </font></td>
                      <td  style="padding-bottom: 1em;"><input type="number" id="mob" name="mob" value="<?php echo $r1[6] ?>" onKeyPress="if(this.value.length>=10) return false;" required="true"></td>
                  </tr>
                  <tr>
                      <td style="padding-bottom: 1em;"><font style="font-family: Verdana;">Choose Country * : </font></td>
                      <td>
                      <select name="country" id="country" class="form-control" onchange="FetchState(this.value)">
                      <?php $c=mysqli_query($con, "select * from countries where id='".$r1[7]."'");
                      $c1=mysqli_fetch_assoc($c);
                      if(!isset($_REQUEST['update'])){
                          echo '<option value='.$c1['id'].'>'.$c1['name'].'</option>';}?>
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
                      <td  style="padding-bottom: 1em;padding-left: 20px;"><font style="font-family: Verdana;">Choose State *  : </font></td>
                      <td style="padding-bottom: 1em;">
						<select name="state" id="state" class="form-control" onchange="FetchCity(this.value)">
						<?php $c=mysqli_query($con, "select * from states where id='".$r1[8]."'");
                      $c1=mysqli_fetch_assoc($c);?>
            <option value="<?php $c1['id']?>"><?php echo  $c1['name']?></option>
          </select>
					</td>
                  </tr>
                  <tr>
                      <td  style="padding-bottom: 1em;"><font style="font-family: Verdana;">Choose City * : </font></td>
                      <td >
                      <select name="city" id="city" class="form-control">
                      <?php $c=mysqli_query($con, "select * from cities where id='".$r1[9]."'");
                      $c1=mysqli_fetch_assoc($c);?>
            <option value="<?php $c1['id']?>"><?php echo  $c1['name']?></option>
          </select>
                      </td>
                      <td><font style="font-family: Verdana;padding-left: 20px;">Enter Address *  : </font></td>
                      <td  style="padding-bottom: 1em;"><input type="text" id="addr" name="addr" value="<?php echo $r1[10] ?>"></td>
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
                               <td><input type="text" id="tb" name="tb" value="<?php echo $r1[11] ?>" required="true"></td>
                               <td><input type="number" id="tyop" name="tyop" value="<?php echo $r1[12] ?>" class="actab" onKeyPress="if(this.value.length>=4) return false;" required="true"></td>
                               <td><input type="number" id="ttm" name="ttm" value="<?php echo $r1[13] ?>" class="actab" onkeypress="if(this.value.length>=4) return false;" required="true"></td>
                               <td><input type="number" id="tom" name="tom" value="<?php echo $r1[14] ?>" class="actab"  onkeypress="if(this.value.length>=4) return false;" required="true"></td>
                               <td><input type="number" id="tp" name="tp" value="<?php echo $r1[15] ?>" class="actab"  onkeypress="if(this.value.length>=4) return false;" required="true" readonly="readonly"></td>

                           </tr>
                           <tr>
                               <td><?php echo "12th"; ?> </td>
                               <td><input type="text" id="twb" name="twb" value="<?php echo $r1[16] ?>" required="true"></td>
                               <td><input type="number" id="twyop" name="twyop" value="<?php echo $r1[17] ?>" class="actab" onKeyPress="if(this.value.length>=4) return false;" required="true"></td>
                               <td><input type="number" id="twtm" name="twtm" value="<?php echo $r1[18] ?>" class="actab" onKeyPress="if(this.value.length>=4) return false;" required="true"></td>
                               <td><input type="number" id="twom" name="twom" value="<?php echo $r1[19] ?>" class="actab" onKeyPress="if(this.value.length>=4) return false;" required="true"></td>
                               <td><input type="number" id="twp" name="twp" value="<?php echo $r1[20] ?>" class="actab" onKeyPress="if(this.value.length>=4) return false;" required="true" readonly="readonly"></td>
                           </tr>
                           
                            </tbody>
                       </table> 
                       
                           
                           <tr>
                                <td colspan="4">
                                   <center> <input type="submit" onclick="validate();" id="update" name="update" value="UPDATE" class="btn btn-danger"></center>
                                </td>
                           </tr>
    </table>
    </div>
            <br>
                       
                            
            <br>
</form>
</body>
<?php }?>
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
