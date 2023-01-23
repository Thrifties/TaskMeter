<?php
	require "sessionUnset.php";
	require "connect.php";
	if (isset($_POST['grpbtn'])){
        $group_id = $_POST['group_id'];
        $_SESSION['group_id'] = $group_id;
        header("refresh: 0; url=SetupPage.php");
	}

    if (isset($_POST['AddBtn'])){
        $activity_id = $_POST['activity_id'];
        $_SESSION['activity_id'] = $activity_id;
        header("refresh: 0; url=AddMemberPage.php");
	}
	mysqli_close($con);
?>