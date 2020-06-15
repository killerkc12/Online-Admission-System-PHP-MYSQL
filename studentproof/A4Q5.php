<?php
function isEmail($eml)
{
    if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{3,4})$^",$eml))
    {
        echo "<script>alert('Email should contain @ symbol');</script>";
    }
    else
    {
        echo "<script>alert('email is valid');</script>";
    }
}
function isCap($str)
{
    if(!preg_match("/^[A-Z]/",$str))
    {
        echo "<script>alert('First letter should be Capital');</script>";
    }
    else
    {
        echo "<script>alert('{$_POST['name']} is valid');</script>";
    }
}
isCap($_POST['name']);
isEmail($_POST['email']);
?>