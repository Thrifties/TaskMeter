<?php
	// require "sessionSet.php";
?>

<!doctype html>
<html>
<head>
	<title>SignUp and Login</title>
	<link rel="stylesheet" type="text/css" href="CSS\signin_signup.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="jquery.js"></script>
	<script src="sweetalert.min.js"></script>
</head>
<body id="signuplog1-body">
<div>
	<div class="container" id="container">
	<div class="form-container sign-up-container">

	<form action="addfac.php" method="post">
		<h1 class = "WhiteBox" id="signuplog1-h1">Create Account</h1>
		<!-- <p  class = "WhiteBox"id="signuplog1-p">Sign up using: </p>
		<div class="social-container">
			<a href="#" style="background-color:#3b5998" class="social"><i class="fa fa-facebook"></i></a>
			<a href="#" style="background-color: #db4a39" class="social"><i class="fa fa-google"></i></a>
			<a href="#" style="background-color: #0072b1" class="social"><i class="fa fa-linkedin"></i></a>
		</div>
		<h3 id="signuplog1-h3"><span id="signuplog1-span">or</span></h3> -->
			<div class="in_up_label">Username</div>
			<input type="text" id = "username" name="facID" placeholder="Faculty ID" required>
			<div class = "in_up_labels">First Name</div>
			<input type="text" name="facfname" placeholder="First Name" style="text-transform:capitalize;" required>
			<div class = "in_up_labels">Last Name</div>
			<input type="text" name="faclname" placeholder="Last Name" style="text-transform:capitalize;" required>
			<div class = "in_up_labels">Email</div>
			<input type="email" name="email" placeholder="Email" required>
			<div class = "in_up_labels">Password</div>
		<input type="password" id = "password" name="pass" placeholder="Password" required>
		<div class = "in_up_labels">Confirm Password</div>
			<input type="password" id = "cpassword" name="cpassword" placeholder="Confirm Password" required>
			<button id = "SignUpbtn" name="register" type ="submit">SignUp</button>
	</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="toLoginFac.php" method="post">
			<h1  class = "WhiteBox" id="signuplog1-h1">Sign In</h1>
			<!-- <div class="social-container">
			<a href="#" style="background-color:#3b5998" class="social" ><i class="fa fa-facebook" ></i></a>
			<a href="#" style="background-color: #db4a39" class="social"><i class="fa fa-google"></i></a>
			<a href="#" style="background-color: #0072b1" class="social"><i class="fa fa-linkedin"></i></a>
		</div>
		<h3 id="signuplog1-h3"><span id="signuplog1-span">or</span></h3> -->
		<div class = "in_up_labels">Faculty ID</div>
			<input type="text" name="faculty_id" placeholder="Faculty ID" required>
			<div class = "in_up_labels">Password</div>
			<input type="password" name="pass" placeholder="Password" required>


		<button id = "sign-inBtn">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1 class = "GradeBox" signuplog1-h1">Welcome Back!</h1>
				<p class = "GradeBox" id="signuplog1-p">To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn" onclick="changeImage('TaskMeterLogo.png')">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1 class = "GradeBox" id="signuplog1-h1">Hello, Friend!</h1>
				<p class = "GradeBox" id="signuplog1-p">Enter your details and start journey with us</p>
				<button class="ghost" id="signUp" onclick="changeImage('TaskMeter Logo (1) (1).png')">Sign Up</button>
			</div>
		</div>
	</div>
	<div id="logocontainer">
	<img src="TaskMeter Logo (1) (1).png" height=auto width="150" id="logo" ></img>
</div>
	</div>
</div>




<script type="text/javascript">


	const container = document.getElementById('container');
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
container.classList.add("right-panel-active");

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		console.log('test');
		container.classList.remove("right-panel-active");
		
	});

	function changeImage(fileName){
		let img = document.querySelector("#logo");
		img.setAttribute("src", fileName);
	}

</script>
</body>
</html>

<script>

$(document).ready(function(){

$(document).on("blur", "#username", function(){
		var username = $(this).val();

		$.ajax({              
			method: "POST",
			url: "usernamefac.php",
			data: {username:username},
			success : function(data){
			var state = JSON.parse(data);                       
			console.log(state);
			if(state.status == 'error'){ 
				Swal.fire({
				icon: "error",
				text: state.input+" Already in Use",
				showConfirmButton: false,
				timer:2000,                     
			  })
			  .then(function(){
				$("#username").val('');
			  })
			}

			  else {
				Swal.fire({
				icon: "success",
				iconColor: "#30a702",
				title:number,
				text: "Generated Successfully",
				showConfirmButton: false,
				timer:2000,                      
			  })
			}  
			}
		})
	})
	var pass= document.getElementById('password');
	var cpass= document.getElementById('cpassword');
	var spass= document.getElementById('username');
	

	$(document).on("blur", "#username", function(){
		var sposValue = spass.value.trim();
		if(sposValue.length < 10 || sposValue.length > 10){

		Swal.fire({
		icon: "error",
		iconColor: "#FF2E2E",
		text:"Faculty ID should be 10 characters",
		showConfirmButton: false,
		timer: 2000,
		})
		.then(function(){
		$("#username").val('');
		})
		}
	})



	$(document).on("blur", "#password", function(){
		var posValue = pass.value.trim();
	if(posValue.length < 6){
	
			Swal.fire({
			icon: "error",
			iconColor: "#FF2E2E",
			text:"Password should be at least 6 characters",
			showConfirmButton: false,
			timer: 2000,
			})
			.then(function(){
			 $("#password").val('');
			})

	}
})

	$(document).on("blur", "#cpassword", function(){
		var posValue = pass.value.trim();
		var cposValue = cpass.value.trim();
		
	if(posValue !== cposValue) {

			Swal.fire({
			icon: "error",
			iconColor: "#FF2E2E",
			text:"Password and Confirm Password did not match",
			showConfirmButton: false,
			timer: 2000,
			})
			.then(function(){
			 $("#password").val('');
			 $("#cpassword").val('');
			
			})
						
	}

	})


})

</script>