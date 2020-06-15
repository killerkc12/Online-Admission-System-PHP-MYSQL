<?php
if($_SERVER['REQUEST_METHOD']=='GET')
{
?>
<html>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
<input type="text" name="str" placeholder="Enter String"><br>
<input type="submit" value="submit">
</form>
</body>    
</html>
<?php
}
else if($_SERVER['REQUEST_METHOD']=='POST')
{
    echo strrev($_POST['str']);
}
?>