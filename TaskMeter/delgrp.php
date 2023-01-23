<?php
	require "sessionUnset.php";
	require "connect.php";


            $query = "DELETE FROM `groupings` WHERE `group_id` = '".$_SESSION['group_id']."'";
            if(mysqli_query($con,$query)){
                header("refresh: 0; url=Dashboard.php");
            }
            else{
                header("refresh: 0; url=SetupPage.php");
            }

    

	mysqli_close($con);

?>