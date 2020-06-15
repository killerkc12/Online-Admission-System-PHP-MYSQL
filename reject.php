<?php

error_reporting(0);

if(isset($_REQUEST['reason']))
{
    include 'config.php';
    
    $getid= $_COOKIE["id"];
    $eml=$_COOKIE['eid'];
    $reason=$_REQUEST["rejectreason"];
    
    $result = mysqli_query($con,"UPDATE t_user_course SET status='rejected' WHERE s_detid='".$getid."'");
    
    if($result)
    {
        $sql = "insert into t_rejected values(";
        $sql.= "'" .$getid. "',";
        $sql.= "'" .$reason. "')";
        
        $r = mysqli_query($con, $sql);
        if($r)
        {
            $q1=mysqli_query($con, "select * from t_user_course where s_detid='".$getid."'");
            if($result1=mysqli_fetch_array($q1))
            {
                $q3 = mysqli_query($con,"select * from user_data where s_id='".$result1["s_id"]."'");
                if($result3=mysqli_fetch_array($q3))
                {
                    $done=require_once("mail-reject.php");
                }
            }
        }
        else
        {
            echo "<script>alert('error in inserting');</script>";
        }
    }
    else
    {
        echo "<script>alert('error in updating');</script>";
    }
}

?>
<!-- 
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
<script type="text/javascript">

</script>
</head>
<body style="background-image:url('./images/inbg.jpg');">
<div id="dvlogin" style="box-shadow: 0px 5px 10px #999999;margin-top:150px;">
<center>
<font style="color: #3399ff; margin-left:30px; font-family: Verdana;font-size:20px;">
<?php 
setcookie("id",$_GET["id"]);
//echo $_COOKIE['id'];
setcookie("eid",$_GET['eid']);

?>
            <form  method="post" action="reject.php">
            <font style="color:black; margin-left:30px; font-family: Verdana;  margin-top:15px; font-size:17px;">Enter Rejection Reason: * </font>
            <input type="text" name="rejectreason" required="true">
            <input type="submit" value="Submit" name="reason">
            </form>         
</font>
</center>
</div>                     
</body>
</html>