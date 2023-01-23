<?php
	require "sessionUnset.php";
	require "connect.php";

        $groupid = $_POST['group_id'];
		$studid = $_POST['stud_id'];
		$task = $_POST['task'];
		$taskP = $_POST['taskP'];
		$deadline = $_POST['deadline'];
		
		$add = "UPDATE `groupings` SET `task`='$task',`taskP`='$taskP',`deadline`='$deadline' WHERE `group_id` = '$groupid' AND `stud_id` = '$studid'";
	
		if(mysqli_query($con,$add)){
				header("refresh: 0; url=SetupPage.php");
			}
			else{
				header("refresh: 0; url=AddMemberPage.php");
			}
		
    mysqli_close($con);
?>