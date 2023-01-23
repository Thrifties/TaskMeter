<?php
	require "sessionUnset.php";
	require "connect.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/SetupPage.CSS"> 
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <script src="jquery.js"></script>
        <script src="sweetalert.min.js"></script>
    </head>
    <body>
        
        <div class="container">
            <div class="cardheader">
                <div class="leftside">
                    <div class="bckbtn">
                        <button type = "submit" class = "Bck"id = "delgrp" name="delgrp">
                            <i class='bx bx-chevron-left'></i>
                        </button>
                    </div>
                    <div>
                        <h1>Setup Group</h1>
                    </div>
                </div>
                <div>
            <form action="rndm.php" method="POST">
                    <button class="AddBtn" type="submit" name="AddBtn" id="AddBtn">
                        <a class="AddMember">Add Member</a>
                    </button>
                </div>
            </div>
            <div class="cardbody" id = "cardbody" name = "cardbody">
                <div class="progress-circular" id = "progress-circular" name = "progress-circular">
                        <input type="text" id = "percent"class="value" name = "sum" value = "0%" disabled="disabled">
                </div>
                <table class="content-table">
                    <!-- div class="prof-in-charge">
                    <div class="profname">
                        <label class="PIC"> Professor in charge: </label>
                        <input type="text" id = "faculty_id" name="faculty_id" placeholder="Faculty ID" required>
                        <select id="dep" name = "faculty_id" required>

                        </select>
                    </div>
                </div> 
                <div class="prof-in-charge">-->
                    <div class="profname">
                         <div class="input-field">
                                <input type="hidden" id = "actno" name="activity_id" value = " ">
                            </div>
                        <label class="PIC"> Group ID: </label>
                        <input id = "group_id"type="text" name="group_id" placeholder="Group ID" id = "group_id" value = "<?php echo $_SESSION['group_id']?>" disabled = "disable">
                    </div>
                </div>
        </form>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Task</th>
                            <th>Percentage</th>
                            <th>Deadline</th>
                            <th colspan=2> Edit/Delete </th>  
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        require "connect.php";
                        $query = "SELECT `activity_id`, `stud_ID`, `name`, `task`, `taskP`, `deadline` FROM `groupings` WHERE `group_id` = '".$_SESSION['group_id']."'";
                        
                        $result = mysqli_query($con,$query);

                        if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            
                            echo '<tr> 
                                        <td>'.$row['stud_ID'] .'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['task'] .'</td>
                                        <td>'.$row['taskP'].' </td>
                                        <td>'.$row['deadline'].' </td>

                                        <td> <button class="editupdbtn" type = "submit" id = "updrec" name="updrec"><a href="editrecord.php?stud_id='.$row['stud_ID'].'" style="text-decoration:none"> Update </a></button> </td>
                                        <td> <button class="editdelbtn" type = "submit" id = "delrec" name="delrec"><a  href="deleterecord.php?stud_id='.$row['stud_ID'].'" style="text-decoration:none"> Delete </a></button> </td>
                                    </tr>';
                                
                        }
                        echo '</table>';

                        }

                        else
                        {
                            
                        }

                        mysqli_close($con);

                        ?>
                    </tbody>
                </table>
                <form id = "formconfirm" action="confirmSetup.php" method="post">
                    <button id = "confirmbtn" name = "confirmbtn" >Confirm Setup</button>
                </form>
            </div>
        </div>
        <script src="JavaScript\PBJS.js">
        </script>
    </body>
</html>

<script>

$(document).ready(function(){  

    /*$.get("departmentData.php", function(data){
            $('#dep').html(data); 
        });*/

    $('#AddBtn').click(function(){
           var number = 1 + Math.floor(Math.random() * 999999);
           $("#actno").val(number);
    })

    $.get("percent.php", function(data){
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

    $('#delgrp').click(function(){

        Swal.fire({
		icon: "warning",
		title: 'Are You Sure You Want To Cancel The Group Setup?',
		showConfirmButton: true,
		showCancelButton: true,
		})
		.then((result) =>{
			if (result.isConfirmed) {
    			window.location.href = "delgrp.php";
  			} else if (result.isDenied) {
    			window.location.href = "SetupPage.php";
  			}
		})
        
    })

    $('#confirmbtn').click(function(){

    $('#percent').val(data);
    var sumPercentage = data.trim().substring(0, data.trim().length - 1); 
    if(sumPercentage != 100){

        Swal.fire({
            icon: "error",
            title: "Total Percentage Must Be Equal TO 100.",
            showConfirmButton: false,
            timer: 2000,
            })
            .then(function(){
            window.location.href = "SetupPage.php" 
            })
        
    } else {
        window.location.href = "confirmSetup.php";
    }


    })
    


})
</script>