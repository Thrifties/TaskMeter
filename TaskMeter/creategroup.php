<?php
	require "sessionUnset.php";
	require "connect.php";
	if (isset($_POST['AddBtn'])){
	$group_id = $_POST['group_id'];
	$activity_id = $_POST['activity_id'];
	$_SESSION['group_id'] = $group_id;
	$_SESSION['activity_id'] = $activity_id;

	
	$query = "INSERT INTO `groupings`(`group_id`) VALUES ('$group_id')";

	if(mysqli_query($con,$query)){
		header("refresh: 0; url=AddMemberPage.php");
		
	}
	else{
		echo ("<script>alert('Registration failed.')</script>");
		header("refresh: 0; url=SetupPage.php");
	}
	}
	mysqli_close($con);
	
?>