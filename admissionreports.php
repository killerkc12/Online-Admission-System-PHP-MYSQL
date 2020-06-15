<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reports i PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php
include 'config.php';
  $query = "SELECT * FROM t_institute Order by i_name";
  $result = $con->query($query);
?>
<body class="p-3 mb-2 bg-light text-dark">
    <div class="container">
        <div class="p-3 mb-2 bg-primary text-white">
        <span><a href="reports.php"><input type="button" value="BACK" class="btn btn-danger"></a></span>
            <b style="margin-left: 350px;font-size: 27px;">REPORTS OF ADMISSIONS</b>
        </div>
        <div>
            <form action="admissionreports.php" method="post">
            <table class="table table-hover">
            <tr>
            <td>
          <select name="institute" id="institute" class="form-control" onchange="FetchCourse(this.value)"  required>
            <option value="">Select institute</option>
          <?php
            if ($result->num_rows > 0 ) {
               while ($row = $result->fetch_assoc()) {
                echo '<option value='.$row['i_name'].'>'.$row['i_name'].'</option>';
               }
            }
          ?> 
          </select>
        </td>
                <td>
          <select name="course" id="course" class="form-control" onchange="FetchData(this.value)"  required>
            <option>Select Course</option>
          </select>
         </td>
                <td>
            <input type="submit" name=submit class="btn btn-dark">
            </td>
     </tr>
            </table>
            </form>
	

            <div>
            <table class="table table-hover" id="tblData">
            <thead class="thead-dark">
            <tr> 
                <th>Admission ID</th>    
                <th>First name</th>
                <th>Last name</th>     
                <th>Institute name</th>    
                <th>Course name</th>     
            </tr>
            </thead>
            <?php

if(isset($_POST["submit"]))
{
    echo "<tbody>";
    $q=mysqli_query($con,"select * from t_user_course where i_name='".$_POST['institute']."' and c_name='".$_POST['course']."'");
    while($r=mysqli_fetch_array($q))
    {
        echo "<tr>";
        echo "<td>$r[0]</td>";
        $q1=mysqli_query($con, "select * from user_data where s_id='".$r[1]."'");
        while($rs=mysqli_fetch_array($q1))
        {
        echo "<td>$rs[1]</td>";
        echo "<td>$rs[2]</td>";
        }
        echo "<td>$r[2]</td>";
        echo "<td>$r[3]</td>";
        
        //echo "<td>$r[12]</td>";
        echo "</tr>";
    }
    echo "</tbody>";
}

?>
            
          </table>
            <input type="button" onclick="window.print()" value="Print" class="toggle btn btn-primary">
        </div>
    </div>
</body>
<script type="text/javascript">
  function FetchCourse(id){
    $('#course').html('');
    $('#city').html('<option>Select City</option>');
    $.ajax({
      type:'post',
      url: 'admissionreports1.php',
      data : { institute_name : id},
      success : function(data){
         $('#course').html(data);
      }

    })
  }

 

  
</script>
</html>
