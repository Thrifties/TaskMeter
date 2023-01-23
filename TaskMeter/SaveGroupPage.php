<?php
	require "sessionUnset.php";
	require "connect.php";
    $group_id = $_SESSION['group_id'];
    $group_name = $_POST['group_name'];
    $faculty_id = $_POST['faculty_id'];

	 if(isset($_POST['faculty_id'])){
        $query = "UPDATE `groupings` SET `faculty_id` = '$faculty_id' WHERE `group_id` = '$group_id'";
        if(mysqli_query($con,$query)){
            header("refresh: 0; url=Dashboard.php");
        }
        else{
            header("refresh: 0; url=Groups.php");
        }
    } else if(!isset($_POST['faculty_id'])){
        $query = "UPDATE `groupings` SET `faculty_id` = 'Not Assigned' WHERE `group_id` = '$group_id'";
        if(mysqli_query($con,$query)){
            header("refresh: 0; url=Dashboard.php");
        }
        else{
            header("refresh: 0; url=Groups.php");
        }
    } 


    


    if (isset($_POST['group_name'])){
        $query = "UPDATE `groupings` SET `group_name` = '$group_name' WHERE `group_id` = '$group_id'";
        if(mysqli_query($con,$query)){
            header("refresh: 0; url=Dashboard.php");
        }
        else{
            header("refresh: 0; url=Groups.php");
        }
    }
    else if(!isset($_POST['group_name'])){
        $query = "UPDATE `groupings` SET `group_name` = 'Group' WHERE `group_id` = '$group_id'";
        if(mysqli_query($con,$query)){
            header("refresh: 0; url=Dashboard.php");
        }
        else{
            header("refresh: 0; url=Groups.php");
        }
    }


        
	mysqli_close($con);
?>
