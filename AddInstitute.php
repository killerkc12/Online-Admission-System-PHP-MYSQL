<?php

error_reporting(0);
session_start();
include 'config.php';

$iname=$_REQUEST["iname"];
$iemail=$_REQUEST["iemail"];
$ilocation=$_REQUEST["ilocation"];

$q=mysqli_query($con,"select ad_name from t_admin where ad_id='".$_SESSION['ad']."'");
$n=  mysqli_fetch_assoc($q);
$adname= $n['ad_name'];

   $sql ="insert into t_institute values(";
    $sql .="'" . $iname . "',";
    $sql .="'" . $iemail . "',";
    $sql .="'" . $ilocation . "')";
    
    $inst = mysqli_query($con, $sql);
    if($inst)
    {
        echo "inserted";
    }
    else
    {
        echo "error";
    }
