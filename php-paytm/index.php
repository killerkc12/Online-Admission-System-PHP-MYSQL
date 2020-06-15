
<?php
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php
// setcookie("id",$_GET['id']);
// setcookie("amt",$_GET['amt']);
?>
    <form method="POST" action="pgRedirect.php">
    <div class="form-control">
    <label for="">Order ID</label>
    <input id="ORDER_ID"  name="ORDER_ID" value="<?php echo "OD".rand(10000,500000) ?>" type="text"/>
    </div>
    <div class="form-control">
    <label for=""> Customer ID</label>
    <input type="text" id="CUST_ID" name="CUST_ID" value="CUST001"/>
    </div>
    <div class="form-control">
    <label for="">INDUSTRY TYPE ID</label>
    <input id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" type="text" value="Film" />
    </div>
    <div class="form-control">
    <label for="">CHANNEL ID</label>
    <input id="CHANNEL_ID" name="CHANNEL_ID" type="text" value="WEB"/>
    </div>
    <div class="form-control">
    <label for="">Transaction Amount</label>
    <input type="text" id="TXN_AMOUNT" name="TXN_AMOUNT" value="<?php echo $_GET['c_amount'] ?>" />
    </div>
    <div class="form-control">
    <label for="">FORM ID</label>
    <input type="text" id="FORM_ID" name="FORM_ID" value="<?php echo $_GET['s_detid'] ?>" />
    </div>
    <div class="form-control">
    <label for="">STUDENT ID</label>
    <input type="text" id="S_ID" name="S_ID" value="<?php echo $_GET['s_id'] ?>" />
    </div>
    <div class="form-control">
    <label for="">INSTITUTE NAME</label>
    <input type="text" id="I_NAME" name="I_NAME" value="<?php echo $_GET['i_name'] ?>" />
    </div>
    <div class="form-control">
    <label for="">COURSE NAME</label>
    <input type="text" id="C_NAME" name="C_NAME" value="<?php echo $_GET['c_name'] ?>" />
    </div>
    <input type="submit" class="btn btn-primary"/>

    </div>
    </form>
</body>
</html>