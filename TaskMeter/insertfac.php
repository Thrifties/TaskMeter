<?php
	require "connect.php";

	if(isset($_POST['AddBtn'])){
        $facultyid = $_POST['faculty_id'];
        $groupid = $_POST['group_id'];

        $add = "UPDATE `groupings` SET `faculty_id`='$facultyid' WHERE `group_id` = '$groupid'";
        
        if(mysqli_query($con,$add)){
            header("refresh: 0; url=AddMemberPage.php");
        }
        else{
            header("refresh: 0; url=SetupPage.php");
        }
    }
mysqli_close($con);
?>