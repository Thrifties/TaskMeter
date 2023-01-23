<head>
    <script src="jquery.js"></script>
    <script src="sweetalert.min.js"></script>
</head>

<?php
	require "connect.php";
	$facid = $_POST['facID'];
	$facfname = $_POST['facfname'];
	$faclname = $_POST['faclname'];
	$facemail = $_POST['email'];
	$facpassword = $_POST['cpassword'];
	
	$query = "INSERT INTO `faculty` (`faculty_id`, `fname`, `lname`, `email`, `pass`) VALUES ('$facid', '$facfname', '$faclname', '$facemail', '$facpassword')";
	if(mysqli_query($con,$query)){
		echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
            icon: "success",
            title: "Registered Successfully!",
            showConfirmButton: false,
            timer: 2000,
            })
            .then(function(){
            window.location.href = "signinlog-fac.php" 
            })
            });
            </script>
            ';
	}
	else{
		echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
            icon: "error",
            title: "Register Failed!",
            showConfirmButton: false,
            timer: 2000,
            })
            .then(function(){
            window.location.href = "signuplog-fac.php" 
            })
            });
            </script>
            ';
	}
	mysqli_close($con);
?>