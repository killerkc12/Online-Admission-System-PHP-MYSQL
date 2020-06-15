<?php
error_reporting(0);
$getid= $_GET["id"];
$eml=$_GET['eid'];
include 'config.php';




$q1=mysqli_query($con, "select * from t_user_course where s_detid='".$getid."'");
if($result1=mysqli_fetch_array($q1))
{
    $q2=mysqli_query($con, "select * from t_course where c_name='".$result1["c_name"]."'");
    if($result2=mysqli_fetch_array($q2))
    {
        
        if($result2["c_available_seats"]>0)
        {
            $available=$result2["c_available_seats"];
            $ded=$available-1;
            
            $q3 = mysqli_query($con,"select * from user_data where s_id='".$result1["s_id"]."'");
            if($result3=mysqli_fetch_array($q3))
            {
                $result5=mysqli_query($con, "update t_course set c_available_seats=$ded where c_name='".$result1["c_name"]."'");
                $result = mysqli_query($con,"UPDATE t_user_course SET status='approved' WHERE s_detid='".$getid."'");
                
                if($result)
                {
                    $done=require_once("mail-confirm.php");
                }
                else
                {
                    echo "error";
                }
            }
        }
        else 
        {
            echo "<script>alert('Seats are already full')</script>";
        }
    }
}
    ?>