<head>
    <script src="jquery.js"></script>
    <script src="sweetalert.min.js"></script>
</head>


<?php
  require "sessionUnset.php";
	require "connect.php";	
	$user = $_POST["user"];
	$fname = $_POST["fname"];
  $lname = $_POST["lname"];
	$email = $_POST["email"];
  $cpass = $_POST["cpass"];
	$pass = $_POST["pass"];

	$query = "UPDATE `student` SET `fname`='$fname',`lname`='$lname',`email`='$email',`pass`='$pass' WHERE stud_id='$user'and pass='$cpass'";
	
  if(mysqli_query($con,$query)){
    $_SESSION["user"] = $user;
		$_SESSION["pass"] = $pass;
		echo '
        <script>
                                            $(document).ready(function(){
                                                Swal.fire({
                                                    icon: "success",
                                                    title: "Edit Successful!",
                                                    showConfirmButton: false,
                                                    timer: 2000,
                                                  })
                                                  .then(function(){
                                                    window.location.href = "userSettings.php" 
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
                                                    iconColor: "#FF2E2E",
                                                    title: "Edit Unsuccessful!",
                                                    text:"Incorrect Password",
                                                    showConfirmButton: false,
                                                    timer: 2000,
                                                  })
                                                  .then(function(){
                                                    window.location.href = "userSettings.php" 
                                                  })
                                            });
                                            </script>
                                            ';
	}
	mysqli_close($con);
?>