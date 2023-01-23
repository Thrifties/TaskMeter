<?php
    require "sessionUnset.php";
    require "connect.php";
    $taskp = $_POST['taskP'];
    $group_id = $_SESSION['group_id'];
    if(isset($_POST['taskP'])){
        

        $query = "SELECT SUM(`taskP`) AS Sum FROM `groupings` WHERE `group_id` = '$group_id'";
        
        $result =$con->query($query);
        $convert = mysqli_fetch_assoc($result);
        $sum = $convert['Sum'] + $taskp;
        if($sum > 100){
            echo json_encode(array('status' => 'error', 'input' => $_POST['taskP']));
        }
        
        else{
            $_SESSION['sum'] = $convert['Sum'];
            echo json_encode(array('status' => 'success'));
        }

    }
?>