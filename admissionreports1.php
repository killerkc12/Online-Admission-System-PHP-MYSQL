<?php
include 'config.php';

if (isset($_POST['institute_name'])) {
    $query = "SELECT * FROM t_course where c_name in (select c_name from t_institute_course where i_name='".$_POST['institute_name']."')";
    $result = $con->query($query);
    if ($result->num_rows > 0 ) {
        echo '<option value="">Select Course</option>';
        while ($row = mysqli_fetch_array($result)) {
            echo '<option value='.$row['c_name'].'>'.$row['c_name'].'</option>';
        }
    }else{
        
        echo '<option>No Course Found!</option>';
    }
    
}


?>