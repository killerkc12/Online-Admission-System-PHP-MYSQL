 <?php
error_reporting();
include 'config.php';

?>
<html>
<head>
<title>Reports i PHP</title>    
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
       <!--autosearch--> 
       
       <script type="text/javascript" src="jquery/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="jquery/jquery-ui-1.8.2.custom.min.js"></script> 
       <link href="css/css.css" rel="stylesheet" type="text/css" />
        
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    
</head>
<body class="p-3 mb-2 bg-light text-dark">
    <div class="container">
        <div class="p-3 mb-2 bg-success text-white" style="margin-bottom: 30px;padding: 10px;">
            <h1 align="center">REPORTS OF Registered Students</h1>
        </div>
            <table class="table table-hover" id="tblData">
            <thead class="thead-dark">
            <tr>  
                <th>ID</th>
                <th>NAME</th>
                <th>DATE OF BIRTH</th>
                <th>EMAIL ID</th>
                <th>CONTACT NO.</th>    
                
            </tr>
            </thead>
            <?php
            $rs1 = mysqli_query($con,"select * from user_data");
            while($ar = mysqli_fetch_array($rs1))
            {
                echo "<tr>";
                
                echo "<td>" . $ar[0] . "</td>";
                echo "<td>" . $ar[3] . "</td>";
                echo "<td>" . $ar[2] . "</td>";
                echo "<td>" . $ar[4] . "</td>";
                echo "<td>" . $ar[5] . "</td>";
            }
            ?>
            </table>
            <input type="button" onclick="window.print()" value="Print" class="toggle btn btn-primary">
        </div>
        <div>
        </div>
    </div>
</body>
</html>