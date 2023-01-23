<?php
    require "sessionUnset.php";
    require "connect.php";
    
    $group_id = $_SESSION['group_id'];

    $department = "SELECT `faculty_id`, CONCAT(`fname`,' ',`lname` ) as Name 
    FROM `faculty` WHERE `faculty_id` 
    NOT IN (SELECT `faculty_id` FROM `groupings` 
    WHERE `group_id` = '$group_id')";
    $departmentResult =$con->query($department);

    $query2 = "SELECT `faculty_id` FROM `groupings` WHERE `group_id` = '$group_id'";
        
    $result2 = mysqli_query($con,$query2);
    $row2 = mysqli_fetch_assoc($result2);
    $faculty_id = $row2['faculty_id'];   

        if($departmentResult->num_rows > 0 ){
            echo '<option selected value ="Not Assigned"> Choose Faculty</option>';
            while($res = $departmentResult->fetch_assoc()){
                echo '<option value = '.$res['faculty_id'].'>'. $res['Name'] .'</option>';
            }
        }
        else{
            echo '<option selected value ='.$row2['faculty_id'].'>Select Faculty</option>';
        }

?>