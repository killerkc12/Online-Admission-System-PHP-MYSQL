<?php
include_once 'config.php';

if (isset($_POST['country_id'])) {
    $query = "SELECT * FROM states where country_id=".$_POST['country_id'];
    //$result = $db->query($query);
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0 ) {
        echo '<option value="">Select State</option>';
        while ($row = $result->fetch_assoc()) { 
            echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
        }
    }else{
        
        echo '<option>No State Found!</option>';
    }
    
}elseif (isset($_POST['state_id'])) {
    
    
    $query = "SELECT * FROM cities where state_id=".$_POST['state_id'];
    //$result = $db->query($query);
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0 ) {
        echo '<option value="">Select City</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
        }
    }else{
        
        echo '<option>No City Found!</option>';
    }
    
}


?>