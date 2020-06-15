<?php
error_reporting();
session_start();

include 'config.php';
$id=$_REQUEST["id"];
$sql="delete from user_data where s_id='".$id."'";
$delete=mysqli_query($con , $sql);
if($delete)
{
    echo "<script>alert('student deleted successfully');</script>";
    header("location:admin.php");
}
else 
{
    echo "<script>alert('not deleted');</script>";
}

?>