<?php
require "sessionUnset.php";
require "connect.php";
$stud_id=$_GET['stud_id'];

if(isset($_GET['stud_id'])){

        $query = "SELECT `activity_id`, `name`, `task`, `taskP`, `deadline` FROM `groupings` WHERE `group_id` = '".$_SESSION['group_id']."' AND `stud_id` = '$stud_id'";
        $result = mysqli_query($con,$query);

            if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            $activity_id = $row['activity_id'];
            $name = $row['name'];
            $task = $row['task'];
            $taskP = $row['taskP'];
            $deadline = $row['deadline'];                               

            }
}		

mysqli_close($con);

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS\AddMemberPage.css">
        <script src="jquery.js"></script>
	<script src="sweetalert.min.js"></script>
    </head>
    <body>
        <div class="container" id="container_addmember">
        
            <header>Add Member</header>
        
            <form action="updaterecord.php" method="post" name = "deets" id="myForm">
        
                <div class="form">

                    <div class="details" id="studentdetails">

                        <div class="fields">

                            <div class="input-field">
                                <input type="hidden" name="group_id" id = "group_id" value = "<?php echo $_SESSION['group_id']?>" readonly>
                            </div>

                            <div class="input-field">
                                <input type="hidden" name="activity_id" id = "activity_id" value = "<?php echo $activity_id ?>">
                            </div>

                            <div class="input-field">
                                <input type="hidden" id="stud" name="stud_id"value = "<?php echo $stud_id ?>">
                            </div>

                            <div class="input-field">
                            <label> Student Name </label>
                                <input type="text" id="stud_name" name="stud_name"value = "<?php echo $name ?>"readonly>
                            </div>

                            <div class="input-field">
                                <label> Task </label>
                                <input type="text" id = "task" name="task" placeholder="Task" style="text-transform:capitalize;" value = "<?php echo $task ?>" required>
                            </div>

                            <div class="input-field">
                                <label> Task Percentage </label>
                                <input type="number" id = "taskP" name="taskP" placeholder="Input number" min = "1" max = "100" value = "<?php echo $taskP ?>"required>
                            </div>

                            <div class="input-field">
                                <label> Deadline </label>
                                <input type="date" id="staTime" name="deadline"required value = "<?php echo $deadline ?>">
                            </div>
    
                            <button class="submit" id="insertrecord" type="submit" name = "updatebtn">
                                <span class="btnText">Update</span>
                            </button>
                        </div>

                    </div>

                </div>
            
                </div>
            </form>
        </div>

        <script>
            
          
        </script>
    </body>
</html>

<script>
$(document).ready(function(){   
   
    $.get("selectstud.php", function(data){
            $('#stud').html(data); 
        });
        
    
    $(document).on("blur", "#task", function(){
        var task = $(this).val();
            $.ajax({              
                method: "POST",
                url: "task.php",
                data: {task:task},
                success : function(data){
                var state = JSON.parse(data);                       
                console.log(state);
                if(state.status == 'error'){ 
                    Swal.fire({
                    icon: "error",
                    text: state.input+" Is Already Assigned To A Member Of The Group",
                    showConfirmButton: false,
                    timer:2000,                     
                })
                .then(function(){
                    $("#task").val('');
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
    $(document).on("blur", "#taskP", function(){
		var taskP = $(this).val();
		$.ajax({              
			method: "POST",
			url: "taskP.php",
			data: {taskP:taskP},
			success : function(data){
			var state = JSON.parse(data);                       
			console.log(state);
			if(state.status == 'error'){ 
				Swal.fire({
				icon: "error",
				text: state.input+" Will Exceed The Total Percentage",
				showConfirmButton: false,
				timer:2000,                     
			  })
			  .then(function(){
				$("#taskP").val('');
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



    $(document).on("blur", "#staTime", function(){
    const today = new Date().toLocaleString("en-US", {timeZone: "Asia/Manila"});
    var d = Date.parse(today);
    
    var staTime = $("#staTime").val();

    var date1 = new Date(staTime).toLocaleString("en-US", {timeZone: "Asia/Manila"});
    var e = Date.parse(date1);


    
    if (staTime === ""){
        Swal.fire({
        title: "Please Select Deadline Date",
        icon: "warning",
        showConfirmButton: false,
        timer: 1000,
        })
        return false;
    }
    if(e - d < 0){
        Swal.fire({
        title: "Invalid Deadline",
        icon: "warning",
        showConfirmButton: false,
        timer: 1000,
        })
        return false;
    }
    else{
       this.submit();       
    }
    
    })

})

</script>