<?php
error_reporting();
session_start();

include 'config.php';
$id=$_REQUEST["id"];
$sql="delete from t_institute where i_name='".$id."'";
$delete=mysqli_query($con , $sql);
if($delete)
{
    echo "<script>alert('institute deleted successfully');</script>";
    header("location:admin.php");
}
else
{
    echo "<script>alert('not deleted');</script>";
}

?>