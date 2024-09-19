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
    <link rel = "stylesheet" type = "text/css" href ="../src/css/room.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="hero">
        <nav>
            <h2 class="logo"><a style ="color:orangered !important; text-decoration: none !important;"href="homepage.php">Tomasa</a></h2>
            <ul>
                <li><a href="about.php">About</a></li>
                <li><a href="findus.php">Find Us</a></li>
                <li><a href="room.php">Rooms</a></li>
                <li><a href="requests.php">Requests</a></li>
                <li><a href="archive.php">Archives</a></li>
                <li><a href="../src/php/signout_action.php">Sign Out</a></li>
            </ul>
            <button class = "btnNav" type="button" href="booking.php" onclick = "window.location.href =  'booking.php'">
                Book
            </button>
        </nav>
        
        <center>
        <div style=" margin-left:300px; margin-right: 270px;">
            <div class="room-list">
                <div class="room">
                  <div class="room-image" style="background-image: url('../src/images/basic.jpg')"></div>
                  <div class="room-info">
                    <div class="room-name">Single</div>
                    <div class="room-price">Php 800.00/night</div>
                    <div class="room-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                  </div>
                </div>
                <div class="room">
                  <div class="room-image" style="background-image: url('../src/images/group.jpg')"></div>
                  <div class="room-info">
                    <div class="room-name">Group</div>
                    <div class="room-price">Php 2,500.00/night</div>
                    <div class="room-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                  </div>
                </div>
                <div class="room">
                    <div class="room-image" style="background-image: url('../src/images/deluxe.jpg')"></div>
                    <div class="room-info">
                      <div class="room-name">Deluxe</div>
                      <div class="room-price">Php 3,500.00/night</div>
                      <div class="room-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                    </div>
                </div>
        </div>

        <p style="padding-left: 40px;"><a href="booking.php" class="btn btn-dark" style="width: 160px; height: 40px; color: white;">Inquire Now &raquo;</a></p>

        </center>
    </div>
</body>





</html>