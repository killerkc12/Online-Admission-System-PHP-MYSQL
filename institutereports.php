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
        <div class="p-3 mb-2 bg-success text-white" style="margin-bottom: 30px;">
        <span><a href="reports.php"><input type="button" value="BACK" class="btn btn-danger"></a></span>
            <b style="font-size: 28px;margin-left: 350px;">REPORTS OF INSTITUTE</b>
        </div>
        <!-- <div class="form-group col-md-4">
            <form action="coursereports.php">
            <select name="institute" class="form-control">
                <option value="">--Select Institute--</option>
                <?php
                //$query=mysqli_query($con,"select * from t_institute");
                //while($rs=mysqli_fetch_array($query))
                //{
                //    echo "<option value=".$rs['i_id'].">".$rs['i_name']."</option>";
                //}
                ?>      
            </select>
            </div> 
            <div>
            <input type="submit" name="submit" class="btn btn-dark">
            </form>-->
            <table class="table table-hover" id="tblData">
            <thead class="thead-dark">
            <tr>  
                <th>Course Name</th>    
                <th>Course Duration</th>    
                <th>Course Amount</th>    
                <!-- <th>Course Total Seats</th>    
                <th>Course Available seats</th>     -->
            </tr>
            </thead>
            <?php
            $query1=mysqli_query($con,"select * from t_institute")  ;
                while($rs1=mysqli_fetch_array($query1))
                {
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>".$rs1[0]."</td>";
                    echo "<td>".$rs1[1]."</td>";
                    echo "<td>".$rs1[2]."</td>";
                    echo "</tr>";
                    echo "</tbody>";
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