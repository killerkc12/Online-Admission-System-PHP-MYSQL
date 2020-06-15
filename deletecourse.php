<?php
error_reporting();
session_start();

include 'config.php';
$id=$_REQUEST["id"];
$sql="delete from t_course where c_name='".$id."'";
$delete=mysqli_query($con , $sql);
if($delete)
{
    echo "<script>alert('courses deleted successfully');</script>";
    header("location:admin.php");
}
else
{
    echo "<script>alert('not deleted');</script>";
}

?>