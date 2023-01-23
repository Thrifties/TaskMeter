

<?php
    require "connect.php";
    require "sessionUnset.php";

 $query = "SELECT `group_id`, `group_name`, `faculty_id` FROM `groupings` WHERE `stud_ID` = ".$_SESSION['user']."";

$result =mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0 ){

        while($rs = $result->fetch_assoc()){ 

            $grpid = $rs['group_id'];
            $query2 = "SELECT SUM(`taskP`) AS Sum FROM `groupings` WHERE `group_id` = '$grpid' AND `status` = 'completed'";

            $result2 =mysqli_query($con,$query2);

            if(mysqli_num_rows($result2) > 0 ){

                while($rs2 = $result2->fetch_assoc()){ 

                    echo '
                    <a href="Groups.php?group_id='.$rs['group_id'].'" style="text-decoration:none">
                    <div class="grouprow" id = "item">
                    <div class = "grpcolumn" id = "grpcolumn_1">
                    <input type="text" class = "groupDetail" value = "'.$rs['group_id'].'" disabled = "disable" >
                    </div>
                    <div class = "grpcolumn" id = "grpcolumn_2" >
                    <input type="text" class = "groupDetail" value = "'.$rs['group_name'].'" disabled = "disable">
                    </div>
                    <div class = "grpcolumn" id = "grpcolumn_3">
                    <div class="progress-circular" id = "progress-circular" name = "progress-circular">
                    <input type="text" id = "percent"class="value" value = "'.$rs2['Sum'].'%" disabled="disabled">
                    </div>
                    </div>
                    <div class = "grpcolumn" id = "grpcolumn_4">
                    <input type="text" class = "groupDetail" value = "'.$rs['faculty_id'].'" disabled = "disable">
                    </div>
                    </div>
                    </a>';

                    }}

                    else{
                        
                    }
        }}

    else{
        
    }
    mysqli_close($con);
?>


<script>

$(document).ready(function(){ 
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
                   
                    progressCircular.style.background = `conic-gradient(#f9f9fa ${start}deg, #272944 0deg`;
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