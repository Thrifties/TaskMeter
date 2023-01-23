<?php
	require "sessionUnset.php";
	require "connect.php";
    $group_id = $_SESSION['group_id'];

    $query = "SELECT SUM(`taskP`) AS Sum FROM `groupings` WHERE `group_id` = '$group_id' AND `status` = 'completed'";
        
        $result =$con->query($query);
        if($result==true){

            $convert = mysqli_fetch_assoc($result);

        if($convert['Sum'] == NULL){
            echo ('0%');
        }
        
        else{
            echo $convert['Sum'] . '%';
        }
        }
        

	mysqli_close($con);
?>