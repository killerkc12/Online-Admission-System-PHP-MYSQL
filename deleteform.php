<?php
error_reporting(0);
session_start();

//$id=$_GET['id'];
include 'config.php';

$q=mysqli_query($con,"delete from t_user_course where s_detid='".$_GET['id']."'");
if($q)
{
    echo "<script>alert('Course Deleted Successfully'); window.location.href='admsnform.php'</script>";
}
else
{
    echo "<script>alert('Course not Deleted'); window.location.href='admsnform.php'</script>";
    //echo $_GET['id'];
}
?>