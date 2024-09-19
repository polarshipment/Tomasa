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
            <button class = "btnNav" type="button" href="booking.php" onclick = "window.location.href =  'booking.php'">
                Book
            </button>
        </nav>
        
        <div class = "container" style="margin-top: 120px;">
            <div class = "login-box">
            <div class = "row">
            <div class = "col-md-6 login-left" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)); border-radius: 10px;">
                <h2 style="color:orangered; padding-top: 10px; font-size: 60px;"> Get in Touch </h2>
                <form action = "validation.php" method = "post">
                    <div class = "form-group">
                        <br>
                        <h3 style="color:white; text-decoration:underline;">Resort Address</h3>
                        <p style="color: white;">123 Anywhere St., Any City, State, Country 12345</p>
                        <br>
                        <h3 style="color:white; text-decoration:underline;">Email Address</h3>
                        <p style="color: white;">thisIsAnEmail@Gmail.com</p>
                        <br>
                        <h3 style="color:white; text-decoration:underline;">Phone Number</h3>
                        <p style="color: white;">(12) 345 6789</p>
                        <br>
                    </div>
                </form>
    
            </div>
            
            <div class = "col-md-6 login-right" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),url(../src/images/findbg.jpg); border-radius: 10px; background-size: cover; background-position: center;">
    
            </div>
        </div>
    
    </div>

    


</body>





</html>