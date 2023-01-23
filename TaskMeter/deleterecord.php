<?php
	require "sessionUnset.php";
	require "connect.php";

	if(isset($_GET['stud_id'])){

		$stud_id=$_GET['stud_id'];

            $query = "DELETE FROM `groupings` WHERE `group_id` = '".$_SESSION['group_id']."' AND `stud_ID` = '$stud_id'";

            if(mysqli_query($con,$query)){
                header("refresh: 0; url=SetupPage.php");
            }
            else{
                header("refresh: 0; url=SetupPage.php");
            }
	}		

	mysqli_close($con);

?>

<?php
	/* require "connect.php";
	if(isset($_GET['deleteid'])){
		$student_id=$_GET['deleteid'];

		$query="DELETE FROM student_profile WHERE student_id = '$student_id'";
		$result = mysqli_query($con,$query);;

		if($result)
        {
            echo "<script>alert('Student profile deleted successfully.');</script>";
			header("refresh: 0; url=CICTSTALDEX_RegisteredUserspage.php");
        }
		else{
			die(mysqli_error($con));
			
		}
	}








<td> <button class="editdelbtn"><a href="CICTSTALDEX_EditStudentDetails.php?student_info='.$row['student_id'].'"style="text-decoration:none"> Update </a></button> </td>
                <td> <button class="editdelbtn"><a href="toDelete_Student.php?deleteid='.$row['student_id'].'" style="text-decoration:none"> Delete </a></button> </td> */

?>