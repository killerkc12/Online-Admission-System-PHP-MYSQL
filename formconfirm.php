<?php
session_start();
if(isset($_REQUEST["f_sub"]))
    header('location:studennt_dash.php');
    
    ?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
       <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <script language="javascript" type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
        <script language="javascript" type="text/javascript" src="jquery/jquery-ui.js"></script>
        <link href="jquery/jquery-ui.css" rel="stylesheet" type="text/css" />


        <link type="text/css" rel="stylesheet" href="css/sign.css"></link>
         
        
    </head>
    
    
    <body style="background-image:url('./images/inbg.jpg');">
        <form id="formconfirm" action="formconfirm.php" method="post">
  
            <div id="dvlogin" style="box-shadow: 0px 5px 10px #999999">
                    <?php
                        
                    ?>
            </div>
                    
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                        <img src="images/cutm.jpg" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img>
                  </div>
                 </div>    
             </div>
        <div id="dmid">
            
        </div>
        <div id="ddown">
            <br><br><br>
             <div id="dright">
                 <br><br><br><br><br>
                 <center><font style="color: #3399ff; margin-left:30px; font-family: Verdana;font-size:20px;">
                       echo "you have successfully applied to the course" ; ?><br>
                    Once admission will confirm or reject you'll get a email. </font>
                 <br><br>
            
                 <input type="submit" id="f_sub" name="f_sub" value="Go to DashBoard" class="toggle btn btn-primary" style="width:100px; margin-left: 200px;"><br><br>
                 </center>
             </div>
        </div>
        
        </form>
    </body>
</html>
