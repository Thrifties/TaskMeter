<head>
    <script src="jquery.js"></script>
    <script src="sweetalert.min.js"></script>
</head>

<?php
	require "connect.php";
	$studid = $_POST['studID'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$studemail = $_POST['email'];
	$studpassword = $_POST['cpassword'];
	
	$query = "INSERT INTO student (stud_id,fname,lname,email,pass)
	VALUES ('$studid','$fname','$lname','$studemail','$studpassword')";

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
            window.location.href = "stud_signIn.php" 
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
            window.location.href = "signuplog1.php" 
            })
            });
            </script>
            ';
	}
	mysqli_close($con);
?>