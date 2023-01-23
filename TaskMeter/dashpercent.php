<?php
	require "sessionUnset.php";
	require "connect.php";
    $Sum = $rs2['Sum'];
    $Summ = $_POST['Sum'];

    

        if($rs2['Sum'] == NULL){
            echo ('0%');
        }
        
        else{
            echo $rs2['Sum'] . '%';
        }
        
        

	mysqli_close($con);
?>