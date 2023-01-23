<?php
	session_start();
	if(isset($_SESSION["user"]) && isset($_SESSION["pass"])){
		header('Location: Dashboard.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title> Login As </title>
    <link rel="stylesheet" href="CSS\stud_fac.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container" id="container_loginpagechooseuser">

        <center>
            <header> LOGIN AS </header>
        </center>

        <div class="CICTSTALDEXusers">

            <button class="chooseuserbtn">
                <a href="stud_signIn.php" style="text-decoration: none"> <span class="chooseuserbtn_text">
                        Student </span></a> </button>

            <button class="chooseuserbtn">
                <a href="signinlog-fac.php" style="text-decoration: none"> <span class="chooseuserbtn_text">
                        Faculty </span> </a> </button>
        </div>
    </div>
</body>