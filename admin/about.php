<?php
    include "../src/php/db_connect.php";

    if(!isset($_SESSION["user_email"])){
        header("Location: ../public/index.php");
        exit();
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    
    <link rel = "stylesheet" type = "text/css" href ="../src/css/nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="hero">
        <nav>
            <h2 class="logo"><a style ="color:orangered !important; text-decoration: none !important;"href="homepage.php">Tomasa</a></h2>
            <ul>
                <li><a href="requests.php">Requests</a></li>
                <li><a href="archive.php">Archives</a></li>
                <li><a href="../src/php/signout_action.php">Sign Out</a></li>
            </ul>
            <button class = "btnNav" type="button" onclick = "window.location.href =  'booking.php'">
                Book
            </button>
        </nav>
        
        <div class="jumbotron" style="height: 47vh !important; width: 50% !important; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6))  !important; margin-top: 150px; color: orangered; border-radius: 20px !important; margin-left: 200px;">
            <h1 style="font-family: kanit; font-size:130px; padding-left: 30px;">TOMASA</h1>
            <p class="lead" style="font-family:Courier New, Courier, monospace; color: white; padding-left: 30px; padding-right: 10px;">
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            </p>
            <p style="padding-left: 40px;"><a href="booking.php" class="btn btn-outline-dark" style="width: 160px; height: 40px; color: white;">Inquire Now &raquo;</a></p>
        </div>
    
    </div>

    


</body>





</html>