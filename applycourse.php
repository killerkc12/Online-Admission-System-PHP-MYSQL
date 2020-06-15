<?php
error_reporting(0);
session_start();

include 'config.php';

$iname= $_REQUEST["iname"];
$cname= $_REQUEST["cname"];

/*
$q = mysqli_query($con,"select * from t_institute_course where c_name='".$cname."'");
while($r = mysqli_fetch_array($q))
{
    $i_name=$r[0];
}
echo $i_name;
*/
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
                    echo "<script>alert('Applied Course Successfully'); window.location.href='admsnform.php'</script>";
                    //header("location:admsnform.php");
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



function DetCode()
{
    include 'config.php';
    $rs  = mysqli_query($con,"select CONCAT('DE',LPAD(RIGHT(ifnull(max(s_detid),'DE00000000'),8) + 1,8,'0')) from t_user_course");
    return mysqli_fetch_array($rs)[0];
}
?>
<input type="hidden" id="detid" name="detid"></td>