<?php
    require "sessionUnset.php";
    require "connect.php";
    $stud_id = $_SESSION['user'];
    $group_id = $_GET['group_id'];
    $_SESSION['group_id'] = $group_id;

    if(isset($_SESSION['user'])){

        $query = "SELECT CONCAT(`fname`,' ',`lname` ) as Name FROM `student` WHERE `stud_id` = '$stud_id'";
            
            $result =$con->query($query);
                if($result==true){
                    $convert = mysqli_fetch_assoc($result);
                    $name = ($convert['Name']);
        }

        if(isset($_SESSION['group_id'])){
            $group_id = $_SESSION['group_id'];

            $query = "SELECT SUM(`taskP`) AS Sum FROM `groupings` WHERE `group_id` = '$group_id' AND `status` = 'completed'";
            
            $result =$con->query($query);
            if($result==true){
                $convert = mysqli_fetch_assoc($result);
                if($convert['Sum'] == NULL){
                echo ('0%');
                }
                else{
                echo $convert['Sum'] . '%';
                }   
            }
        } 
    } 
    
    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS\Groups.CSS">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <script src="jquery.js"></script>
        <script src="sweetalert.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <?php
        require "connect.php";
            if(isset($_SESSION['group_id'])){
                $group_id = $_SESSION['group_id'];


                $query2 = "SELECT `group_name`, `faculty_id` FROM `groupings` WHERE `group_id` = '$group_id'";
        
                $result2 = mysqli_query($con,$query2);

                    if(mysqli_num_rows($result2) > 0){
                        $row2 = mysqli_fetch_assoc($result2);

                        $group_name = $row2['group_name'];
                        $faculty_id = $row2['faculty_id'];                           

                        } 
            }
        mysqli_close($con);
    ?>

    <section class="page-section">
        <div class="containerGroup">
            <div class="top-container">
                <a href="Dashboard.php"><i class='bx bx-chevron-left'></i></a>
                <div class = "groupNum"><?php echo $group_name?></div>
            </div>
            <div class="bottom-container"> 
                <div class="left-container">
                    <div class="progress">
                        <div class = "cardtitle">Group Progress</div>
                        <div class="progress-circular" id = "progress-circular" name = "progress-circular">
                        <input type="text" id = "percent"class="value" value = "0%" disabled="disabled">
                        </div>
                    </div>
                    <div class="file-list">
                        <div class="cardtitle">
                            Files
                        </div>
                        <div class="files">
                            <ul>
                                <li>
                                <?php
                                require "connect.php";
                                    if(isset($_SESSION['group_id'])){
                                    $group_id = $_SESSION['group_id'];

                                     $query3 = "SELECT `file` FROM `groupings` WHERE `group_id` = '$group_id'";
                    
                                    $result3 = mysqli_query($con,$query3);

                                            if(mysqli_num_rows($result3) > 0){
                                                while($row3 = mysqli_fetch_assoc($result3)){
                                                ?>
                                                    <a href = "download.php?file=<?php echo $row3['file'] ?>"> <?php echo $row3['file'] ?></a>
                                                <?php
                                                }

                                            }
                                            else {
                                            } 
                                    }
                                mysqli_close($con);
                                ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <div class="recordtable">
            <form action="SaveGroupPage.php" method="post">
                <div class="groupFacName">
                    
                    <div class = "FacName">
                        <div class="groupName">
                        <div class="input-field">
                        <label> Group Name: &ensp;</label>
                        <!-- <input type="text" id = "task" name="task" placeholder="Professor in charge" style="text-transform:capitalize;"  required> -->
                        <input type = "text" id="group_name" name = "group_name" placeholder = "Edit group name" style="text-transform:capitalize;" value = "<?php echo $group_name?>">

                        </input>
                        </div>
                        </div>
                        <div class="profInput">
                        <div class="input-field">
                        <label> Professor: &ensp;</label>
                        <!-- <input type="text" id = "task" name="task" placeholder="Professor in charge" style="text-transform:capitalize;"  required> -->
                        <select id="dep" name = "faculty_id" value = "<?php echo $faculty_id?>">

                        </select>
                        </div>
                        </div>
                        
                    </div>
                    <div class = "FacName">
                            

                            <button id="addrecordbtn" type="submit" name="addrecordbtn">
                            <div class="addbtn">
                                <i class='bx bx-edit'></i>
                            </div>
                            <div class="addbtn">
                                <a style="text-decoration: none"> Save Edit </a>
                            </div>
                            </button>
                        </form>
                    </div>
                </div>
                <div class=tablebtns>

                    <h6>Member list</h6>
                    
                    <div class="grpbtns">
                         

                        <form action="Editgrp.php" method="post">

                            <button id="addrecordbtn">
                            <div class="addbtn">
                                <i class='bx bx-user-plus'></i>
                            </div>
                            <div class="addbtn">
                                <a style="text-decoration: none"> Edit Members </a>
                            </div>
                            </button>

                        </form>
                    </div>
                    
                </div>

                
            
                <table class="grouptable">
                    <thead>
                        <tr>
                            <th> Student ID </th>
                            <th> Name </th>
                            <th> Task </th>
                            <th> Deadline </th>
                            <th> Status </th>
                            <th> File </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "connect.php";
                        if(isset($_SESSION['group_id'])){
                        $group_id = $_SESSION['group_id'];


                         $query2 = "SELECT `group_name`, `faculty_id` FROM `groupings` WHERE `group_id` = '$group_id'";
        
                        $result2 = mysqli_query($con,$query2);

                                if(mysqli_num_rows($result2) > 0){
                                $row2 = mysqli_fetch_assoc($result2);

                                $group_name = $row2['group_name'];
                                $faculty_id = $row2['faculty_id'];                           

                        } 

                        $query = "SELECT  `stud_ID`, `name`, `task`, `deadline`, `status`, `file` FROM `groupings` WHERE `group_id` = '$group_id'";
                        
                        $result = mysqli_query($con,$query);

                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<tr> 
                                                <td>'.$row['stud_ID'] .'</td>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['task'] .'</td>
                                                <td>'.$row['deadline'].' </td>
                                                <td>'.$row['status'].' </td>
                                                <td>'.$row['file'].' </td>
                                            </tr>';
                                }
                                    echo '</table>';
                            }
                            else {
                            }
                        }
                        mysqli_close($con);
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
<script src = "Javascript\Scripts.js"></script>
</html>

<script>

$(document).ready(function(){ 

    $.get("departmentData.php", function(data){
            $('#dep').html(data); 
        });

    $.get("grouppercent.php", function(data){
            $('#percent').val(data); 
            var sumPercentage = data.trim().substring(0, data.trim().length - 1); 
            var totalPerc = 360*(sumPercentage/100);
          
            let progressCircular = document.querySelector(".progress-circular");
            let start = 0;
            if (sumPercentage >= 101) {
                alert("Invalid percentage input!");
                }
                else{
                let progress = setInterval(() => {
                    if (start < totalPerc) {
                        start++;
                        progressEND();
                    } else {
                       
                        progressEND();
                    }
                    
                    function progressEND() {
                   
                    progressCircular.style.background = `conic-gradient(#272944 ${start}deg, #ededed 0deg`;
                    console.log(start);

                    if (start == totalPerc) {
                        clearInterval(progress);
                        totalPerc = "";
                    }
                    }
                }, 5 );
            } 
    });

})

</script>