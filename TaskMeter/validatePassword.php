<?php
require "sessionUnset.php";
require "connect.php";	
if(isset($_POST['pass'])){
    $user = $_POST["user"];
    $cpass = $_POST["cpass"];
    $query = "SELECT * FROM student WHERE stud_id='$user'and pass='$cpass'";
    $result =mysqli_query($conn, $query);

    if($result->num_rows > 0){
        echo json_encode(array('status' => 'success'));
    }
    
    else{
        echo json_encode(array('status' => 'error'));
    }

}
?>