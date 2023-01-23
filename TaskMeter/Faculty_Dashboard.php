<?php
    require "sessionUnset.php";
    require "connect.php";
    $faculty_id = $_SESSION['user'];

    $query = "SELECT CONCAT(`fname`,' ',`lname` ) as Name FROM `faculty` WHERE `faculty_id` = '$faculty_id'";
        
        $result =$con->query($query);
        if($result==true){
            $convert = mysqli_fetch_assoc($result);
            $name = ($convert['Name']);
    }
    mysqli_close($con); 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS\DashboardCSS.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery.js"></script>
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
            <li>
                <a href="Faculty_Dashboard.php" class = "DashboardPage">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
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
                Dashboard
            </div>

        </section>
    <div class="labels">
        <div id = "labelGroupID">
            Group ID
        </div>
        <div id = "labelGroupName">
            Group Name
        </div>
        <div id = "labelTaskPercent">
            Task Percent
        </div>
        <div id = "labelPIC">
            Prof In Charge
        </div>
    </div>
    <section class="groups" id = "tableBody">
    

    </section>

    <div class = "ToDo">To do:</div>

    <div class="labels">
        <div>
            Activity ID
        </div>
        <div>
            Task Name
        </div>
        <div>
            Task Percent
        </div>
        <div>
            Deadline
        </div>
    </div>
    
    <section class = "LowerSection" id = "tableTasks">


    </section>

    </div>
        
    
    
</body>
</html>

<script>

    function logout()
{
	var choice = confirm("Do you really want to log out?");
	if(choice==true)
	window.location = "toLogout.php";
}

let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange();//calling the function(optional)
        });

        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-tachometer", "bx-menu");//replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu", "bx-tachometer");//replacing the iocns class
            }
        }

$(document).ready(function(){   
    $('#addrecordbtn').click(function(){
           var number = 1 + Math.floor(Math.random() * 999999);
           $("#grpno").val(number);
    })

    $.get("listofgroups.php", function(data){
        $("#tableBody").html(data);
    }) 

    $.get("listoftasks.php", function(data){
        $("#tableTasks").html(data);
    }) 

   
 
})

</script>