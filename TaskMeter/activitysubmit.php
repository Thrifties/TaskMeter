<?php

require "sessionUnset.php";
require "connect.php";
$activity_id=$_GET['activity_id'];

    $query = "SELECT `task`, `deadline` FROM `groupings` WHERE `activity_id` = '$activity_id'";
        
    $result = mysqli_query($con,$query);

            if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            $task = $row['task'];
            $deadline = $row['deadline'];                           

    }
        

    mysqli_close($con); 
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS\activitysubmit.css"> 
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <script src="jquery.js"></script>
    </head>
    <body>
        
        <div class="card">

            <div class="cardheader">
                <div class="bckbtn">

                    <button id="bckbtn">
                        <div class="bckbtn">
                            <i class='bx bx-chevron-left'></i>
                        </div>
                        <div class="bckbtn">
                            <a style="text-decoration: none"> Back </a>
                        </div>
                    </button>

                </div>
                <form action="uploadfile.php" method="post" enctype="multipart/form-data">
                <div class="sbmtbtn">

                    <button type = "submit" id = "sbmtbtn" name = "submit">
                            <a style="text-decoration: none"> Turn In </a>
                    </button>

                </div>
            </div>

            <div class="cardbody">
                <div class = "activityPanel">
                    <div class="input-field">
                        <input type="hidden" name="activity_id" id = "activity_id" value = "<?php echo $activity_id ?>">
                    </div>
                    <div class="activityName">
                         <input type="text" class = "act" id = "actName" value = "<?php echo $task ?>" disabled = "disable">
                    </div>
                    <div class = "activityDeadline">
                        <div>Due &nbsp;</div>
                        <input type="text" class = "act"  id = "actDate" value = "<?php echo $deadline ?>" disabled = "disable">
                    </div>
                        
                    <div class="activityFile">
                        <label for="activityfile" class = "fileUpload">Upload your file here:&nbsp; &nbsp; &nbsp;</label>
                        <input type="file" id = "activityfile" name = "file">
                        
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

<script>
</script>