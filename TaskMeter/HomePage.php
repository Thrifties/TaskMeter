<?php
// require "sessionSet.php";
?>

<!doctype html>
<html> 
	<head>
		<title> Home </title>
		<link rel="stylesheet" type="text/css" href="CSS\homepage.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body id = "HomePage-body">
	
		<div height="auto" width= "auto"> 
			<div id="HomePage-navigation">
				<div id="HomePage-LogoNav">
					<img src="TaskMeterLogo.png" height=auto width="200"></img>
				</div>

				<div id="HomePage-HalfNav">
						<a href="#HomePage-aboutus" id="HalfNav-about">About Us</a>
						<a href="#HomePage-contactus" id="HalfNav-contact">Contact Us</a>
						<a href="login.php" id="HalfNav-login">Log In</a>
						<a href="signup.php" id="HalfNav-signup">Sign Up</a>
				</div>
			</div>
		</div>
		
			
		<div id="HomePage-aboutus" >
			<div class="Homepage-aboutus-details">
				<h1 id="aboutus-h1"> TaskMeter </h1>
				<p id="aboutus-p">
					Taskmeter is a progress tracking system that empowers the productivity of an organization.
					<br />
					It traces the team’s progress on every task that they need to accomplish.
					<br />
					Making tasking easier.
				</p>
			</div>
			
		</div> 
		
		<div id="HomePage-contactus">
			<h1 id="contactus-h1"> Contact Us </h1> 
			<br/>
			<hr width= "300px" > 
			<br/>
			<br/>
			<div class="contactus-social">
				<a href ="https://www.facebook.com" class="social"><i class="fa fa-facebook"></i></a>
				<a href ="https://mail.google.com" class="social"><i class="fa fa-google"></i></a>
				<a href ="https://www.linkedin.com" class="social"><i class="fa fa-linkedin"></i></a>
			</div>
				<br/>
				<p id="contactus-p"> <b>Facebook &emsp;&emsp;&emsp;&emsp; E-mail &emsp;&emsp;&emsp;&emsp;&thinsp; LinkedIn</b></p>
		</div>  


</body>

<script>
	const aboutLink = document.getElementById('about');
	
	aboutLink.addEventListener('click', () => {
			console.log('test');
			window.scrollTo(0,0);
		});
	</script>

</html>