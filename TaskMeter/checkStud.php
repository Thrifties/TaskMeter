<?php
if (isset($_POST['stud_id'])) {
	$stud_id = $_POST['stud_id'];
	require "connect.php";
	$query = mysqli_query($con, "SELECT * FROM `student` WHERE stud_id = '$stud_id'");

	$result = mysqli_query($con, $query);
	$count = mysqli_num_rows($result);

	if ($count == true) {
		$row = mysqli_fetch_array($result);
		$fname = $row['fname'];
		$lname = $row['lname'];

		echo (" Username: " . $fname . " " . $lname);
	}
}
?>