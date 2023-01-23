<?php
    require "sessionUnset.php";
    require "connect.php";
    $group_id = $_SESSION['group_id'];
    
    $department = "SELECT stud_id, CONCAT(fname,' ',lname ) as Name FROM student 
    WHERE stud_id NOT IN (SELECT `stud_ID` FROM `groupings` WHERE `group_id` = '$group_id')";
    
    $departmentResult =$con->query($department);

    if($departmentResult->num_rows > 0 ){
        echo '<option selected disabled value ="default">Choose Student</option>';
        while($res = $departmentResult->fetch_assoc()){
            echo '<option value = '.$res['stud_id'].'>'. $res['Name'] .'</option>';
        }
    }
    else{
        echo '<option selected disabled value ="default">Select Student</option>';
    }

?>