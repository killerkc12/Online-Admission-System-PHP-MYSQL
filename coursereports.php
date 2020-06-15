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
        <div class="p-3 mb-2 bg-primary text-white">
        <span><a href="reports.php"><input type="button" value="BACK" class="btn btn-danger"> </a></span>
            <b style="font-size: 28px;margin-left: 350px;">REPORTS OF COURSES</b>
        </div>
        <div>
            <form action="coursereports.php">
            <table class="table table-hover">
            <tr>
            <td>
            <select name="institute" class="form-control">
                <option value="ALL">--ALL INSTITUTE--</option>
                <?php
                $query=mysqli_query($con,"select * from t_institute");
                while($rs=mysqli_fetch_array($query))
                {
                    echo "<option value=".$rs['i_name'].">".$rs['i_name']."</option>";
                }
                ?>
                </select>      
                </td>
                <td>
            <input type="submit" name=submit class="btn btn-dark">
            </td>
            <td><b>Institute Name:</b></td>
            <?php 
            if(isset($_REQUEST["submit"]))
            {
                $q=mysqli_query($con, "select * from t_institute where i_name='".$_REQUEST["institute"]."'");
                if($r=mysqli_fetch_array($q))
                {
                    echo "<td>".$r[0]."</td>";
                }
            }
            
            ?>
            
            </tr>
            </table>
            </form>
            </div>
            <div>
            <table class="table table-hover" id="tblData">
            <thead class="thead-dark">
            <tr>
            	<th>Institute Name</th>     
                <th>Course Name</th>    
                <th>Course Duration</th>    
                <th>Course Amount</th>    
                <th>Course Total Seats</th>    
                <th>Course Available seats</th>    
            </tr>
            </thead>
            <?php
                if(isset($_REQUEST['submit']))
                {
                    if(($_REQUEST["institute"])=='ALL')
                    {
                        $query1=mysqli_query($con,"select * from t_course")  ;
                        while($rs1=mysqli_fetch_array($query1))
                        {
                            
                            echo "<tbody>";
                            echo "<tr>";
                            $q1 = mysqli_query($con,"select * from t_institute_course where c_name='".$rs1['c_name']."'");
                            if($rs2=mysqli_fetch_array($q1))
                            {
                                echo "<td>".$rs2['i_name']."</td>";
                            }
                            echo "<td>".$rs1[0]."</td>";
                            echo "<td>".$rs1[1]."</td>";
                            echo "<td>".$rs1[2]."</td>";
                            echo "<td>".$rs1[3]."</td>";
                            echo "<td>".$rs1[4]."</td>";
                            echo "</tr>";
                            echo "</tbody>";
                        }
                    }
                    else 
                    {
            $query1=mysqli_query($con,"select * from t_course where c_name in(select c_name from t_institute_course where i_name='".$_REQUEST['institute']."')")  ;
                while($rs1=mysqli_fetch_array($query1))
                {
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>".$rs1[0]."</td>";
                    echo "<td>".$rs1[1]."</td>";
                    echo "<td>".$rs1[2]."</td>";
                    echo "<td>".$rs1[3]."</td>";
                    echo "<td>".$rs1[4]."</td>";
                    echo "</tr>";
                    echo "</tbody>";
                }
                    }

                }
            ?>
            </table>
            <input type="button" onclick="window.print()" value="Print" class="toggle btn btn-primary">
        </div>
    </div>
</body>
</html>