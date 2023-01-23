<?php
require "connect.php";
$group_id = $_POST['group_id'];
if(isset($_POST['username'])){

    $query = "Select stud_id FROM groupings WHERE stud_id = ".$_POST['username']." AND group_id = '$group_id';";
    $result =$con->query($query);

    if($result->num_rows > 0){
        echo json_encode(array('status' => 'error', 'input' => $_POST['username']));
    }
    
    else{
        echo json_encode(array('status' => 'success'));
    }

}
?>