<?php
    require "sessionUnset.php";
    require "connect.php";
if(isset($_POST['number'])){

    $query = "Select group_id FROM groupings WHERE group_id = ".$_POST['number'].";";
    $result =$con->query($query);

    if($result->num_rows > 0){
        echo json_encode(array('status' => 'error'));
    }
    
    else{
        echo json_encode(array('status' => 'success'));
    }

}


?>