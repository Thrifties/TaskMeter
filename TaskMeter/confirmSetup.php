<?php
	/*require "sessionUnset.php";
	require "connect.php";
    $_SESSION['group_id'];
    
	if (isset($_POST['confirmbtn'])){

        $query = "SELECT SUM(`taskP`) AS Sum FROM `groupings` WHERE `group_id` = '".$_SESSION['group_id']."'";
        
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

        if($sum == 100){

            $query = "UPDATE `groupings` SET `role` = 'leader' WHERE `group_id` = '".$_SESSION['group_id']."' AND `stud_ID` = '".$_SESSION["user"]."'";

            echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
            icon: "success",
            title: "Registered Successfully!",
            showConfirmButton: false,
            timer: 2000,
            })
            .then(function(){
            window.location.href = "stud_signIn.php" 
            })
            });
            </script>
            ';
            header("refresh: 0; url=Dashboard.php");
        }
        else{
            
            header("refresh: 0; url=SetupPage.php");
        }
	}
	mysqli_close($con);*/
?>
<?php
	require "sessionUnset.php";
	require "connect.php";

	if (isset($_POST['confirmbtn'])){
        $query = "UPDATE `groupings` SET `role` = 'leader' WHERE `group_id` = '".$_SESSION['group_id']."' AND `stud_ID` = '".$_SESSION["user"]."'";

        if(mysqli_query($con,$query)){
            echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
            icon: "success",
            title: "Registered Successfully!",
            showConfirmButton: false,
            timer: 2000,
            })
            .then(function(){
            window.location.href = "stud_signIn.php" 
            })
            });
            </script>
            ';
            header("refresh: 0; url=Dashboard.php");
        }
        else{
            
            header("refresh: 0; url=SetupPage.php");
        }
	}
	mysqli_close($con);
?>