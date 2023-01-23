<?php
    require "sessionUnset.php";
    require "connect.php";
    $group_id = $_SESSION['group_id'];
    if(isset($_POST['task'])){
        

        $query = "Select task FROM groupings WHERE group_id = '$group_id' AND task = '".$_POST['task']."';";
        $result =$con->query($query);

        if($result->num_rows > 0){
            echo json_encode(array('status' => 'error', 'input' => $_POST['task']));
        }
        
        else{
            echo json_encode(array('status' => 'success'));
        }

    }
?>