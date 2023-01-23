<?php
require "connect.php";
if(isset($_POST['username'])){

    $query = "Select faculty_id FROM faculty WHERE faculty_id = ".$_POST['username'].";";
    $result =$con->query($query);

    if($result->num_rows > 0){
        echo json_encode(array('status' => 'error', 'input' => $_POST['username']));
    }
    
    else{
        echo json_encode(array('status' => 'success'));
    }

}
?>