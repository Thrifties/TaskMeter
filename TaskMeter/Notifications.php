<?php
    require "sessionUnset.php";
    require "connect.php";
    $stud_id = $_SESSION['user'];

    $query = "SELECT CONCAT(`fname`,' ',`lname` ) as Name FROM `student` WHERE `stud_id` = '$stud_id'";
        
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
    <link rel="stylesheet" href="CSS\Notification.css">
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
            <li onclick="TitlePageChange(0, '#E4E9F7')">
                <a href="Notifications.php" class = "NotifPage">
                    <i class='bx bx-task'></i>
                    <span class="links_name">Assignments</span>
                </a>
                <span class="tooltip">Assignments</span>
            </li>
            <li onclick="TitlePageChange(1, '#E4E9F7')">
                <a href="Dashboard.php" class = "DashboardPage">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li id="settingsbtn" onclick="TitlePageChange(4, '#E4E9F7')">
                    <a href="userSettings.php" class = "SettingsPage">
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
                Assignments
            </div>
            
        </section>

    <section class = "LowerSection">
        
        <div class="container-Notification">
            <div class="notDone">
                <h2>Pending</h2>
                <a href="##" class="itemSelect" id="pendingtasks">

                </a>
            </div>


            <div class="done">
                <h2>Done</h2>
                <a href="##" class="itemSelect" id="donetasks">
        
                </a>
            </div>
            
            

                
        </div>

    </section>

    </div>
    
</body>
</html>

<script src = "JavaScript\Scripts.js">
</script>
<script>
$(document).ready(function(){   

    $.get("pendingtasks.php", function(data){
        $("#pendingtasks").html(data);
    })

    $.get("donetasks.php", function(data){
        $("#donetasks").html(data);
    })
 
})

</script>