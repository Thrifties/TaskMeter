<?php
    require "sessionUnset.php";
    require "connect.php";
    $stud_id = $_SESSION['user'];

        $query = "SELECT `stud_id`, `fname`, `lname`, `email`, `pass` FROM `student` WHERE `stud_id` = '$stud_id'";
        $result =$con->query($query);
            if($result==true){
            $convert = mysqli_fetch_assoc($result);
            $fname = ($convert['fname']);
            $lname = ($convert['lname']);
            $email = ($convert['email']);
            $pass = ($convert['pass']);
            }



    $query2 = "SELECT CONCAT(`fname`,' ',`lname` ) as Name FROM `student` WHERE `stud_id` = '$stud_id'";
        
        $result2 =$con->query($query2);
        if($result2==true){
            $convert2 = mysqli_fetch_assoc($result2);
            $name = ($convert2['Name']);
    }
    mysqli_close($con); 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS\userSettings.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery.js"></script>
    <script src="sweetalert.min.js"></script>
</head>

<body>
    <header class="user">
        <div class="profile">
            <div class="active-user">
                <div class="username">Hello, <?php echo $name?> </div>
            </div>
        </div>
        <div class="logoutbtn" onclick="logout()">
            <i class='bx bx-log-out'></i>
            <span>Log Out</span>
        </div>
    </header>
    
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-tachometer icon'></i>
            <div class="logo_name">TaskMeter</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li onclick="TitlePageChange(1, '#E4E9F7')">
                <a href="Faculty_Dashboard.php" class = "DashboardPage">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li id="settingsbtn" onclick="TitlePageChange(4, '#E4E9F7')">
                    <a href="Faculty_userSettings.php" class = "SettingsPage">
                    <i class='bx bxs-user-detail' ></i>
                    <span class="links_name">User Settings</span>
                </a>
                <span class="tooltip">User Settings</span>
            </li>   
        </ul>
    </div>

    <div class="sections">
    <section class="page-section">
        <div class="PageTitle">
                Profile Information
            </div>
        <form action = "edituser.php" method="POST">
            
            <div class = "grpbtn">
                    <button id="editbtn" type="submit" name = "editProfile">
                        <div class="editbtn">
                            <i class='bx bx-edit'></i>
                        </div>
                        <div class="editbtn">
                            <a style="text-decoration: none"> Save Edit </a>     
                        </div>
                    </button>            
            </div>
            
        </section>

    <section class = "LowerSection">
        <div class="container-UserSettings">
        
            <div class="UserDetails">
                
                <div class="row">
                    <div class="NameSettings">
                        <label for="studID"> Student ID: &nbsp;</label>
                        <input type="text" id = "username" name="user" placeholder="Student ID" value = "<?php echo $stud_id?>"readonly>
                        <div>
                            <label>Student Name: </label>
                        </div>
                        <div class="Name2">
                            <input type="text" name="fname" placeholder="First Name" value = "<?php echo $fname?>" style="text-transform:capitalize;">
                            <input type="text" name="lname" placeholder="Last Name" value = "<?php echo $lname?>" style="text-transform:capitalize;">
                        </div>
                        <div class="EmailSettings">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email" value = "<?php echo $email?>">
                        </div>
                    </div>    
                    <div class="passSettings">
                        <h1>Change Password</h1>
                        <label for="">Current Password</label>
                        <input type="password" id = "password" name="cpass" placeholder="Password" required>
                        <label for="">New Password</label>
                        <input type="password" id = "npassword" name="npass" placeholder="Password">
                        <label for="">Re-type New Password</label>
                        <input type="password" id = "cpassword" name="pass" placeholder="Confirm Password">
                    </div>
                </div>
                
                
                    

                </div>
        </div>
        </form>
        
    </section>

    </div>
    
</body>
</html>

<script src = "JavaScript\Scripts.js">
</script>

<script>

$(document).ready(function(){
    
    var npass= document.getElementById('npassword');
	var cpass= document.getElementById('cpassword');

    $(document).on("blur", "#npassword", function(){
		var nposValue = npass.value.trim();
		if(nposValue.length < 6){

		Swal.fire({
		icon: "error",
		iconColor: "#FF2E2E",
		text:"Password should be at least 6 characters",
		showConfirmButton: false,
		timer: 2000,
		})
		.then(function(){
		$("#npassword").val('');
		})
		}
	})

    $(document).on("blur", "#password", function(){
		var password = $(this).val();

		$.ajax({              
			method: "POST",
			url: "password.php",
			data: {password:password},
			success : function(data){
			var state = JSON.parse(data);                       
			console.log(state);
			if(state.status == 'success'){ 
				Swal.fire({
				icon: "error",
				text: " Invalid Current Password",
				showConfirmButton: false,
				timer:2000,                     
			  })
			  .then(function(){
				$("#password").val('');
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

        $(document).on("blur", "#cpassword", function(){
            var nposValue = npass.value.trim();
		    var cposValue = cpass.value.trim();
		
        if(nposValue !== cposValue) {

                Swal.fire({
                icon: "error",
                iconColor: "#FF2E2E",
                text:"New Password and Confirm Password did not match",
                showConfirmButton: false,
                timer: 2000,
                })
                .then(function(){
                    $("#npassword").val('');
			        $("#cpassword").val('');
                
                })
                            
        }

        })

})

</script>