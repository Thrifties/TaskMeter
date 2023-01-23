<?php
    require "connect.php";
    require "sessionUnset.php";

 $query = "SELECT `activity_id`, `task`, `taskP`, `deadline` FROM `groupings` WHERE `stud_ID` = ".$_SESSION['user']." AND `status` = 'assigned'";

$result =mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0 ){

        while($rs = $result->fetch_assoc()){ 

            /* echo '<a href="activitysubmit.php?activity_id='.$rs['activity_id'].'" style="text-decoration:none"><div class="item" id="item">
            <input type="text" class = "taskDetail" value = "'.$rs['activity_id'].''. $rs['task'] . ''. $rs['taskP'] . ''. $rs['deadline'] . '" disabled = "disable">
            </div></a>'; */
            
            echo '<a href="activitysubmit.php?activity_id='.$rs['activity_id'].'" style="text-decoration:none">
            <div class="taskrow" id = "item">
            <div class = "taskcolumn" id = "taskcolumn_1">
            <input type="text" class = "taskDetail" id = "act" value = "'.$rs['activity_id'].'" disabled = "disable">
            </div>
            <div class = "taskcolumn" id = "taskcolumn_2">
            <input type="text" class = "taskDetail" id = "act" value = "'. $rs['task'].'" disabled = "disable">
            </div>
            <div class = "taskcolumn" id = "taskcolumn_3">
            <div class="progress-circular" id = "progress-circular" name = "progress-circular">
            <input type="text" id = "percent"class="value" value = "'. $rs['taskP'].'" disabled="disabled">
            </div>
            </div>
            <div class = "taskcolumn" id = "taskcolumn_4">
            <input type="text" class = "taskDetail" id = "act" value = "'.$rs['deadline'].'" disabled = "disable">
            </div>
            </div>
            </a>';
            
            
        }}

    else{
        echo '<div class="item" id="item">
            <h1>Nothing Left To Turn In.</h1>
            </div></a>';
    }
    mysqli_close($con);
?>
