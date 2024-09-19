<?php
    session_start();
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
                <li><a href="about.php">About</a></li>
                <li><a href="findus.php">Find Us</a></li>
                <li><a href="room.php">Rooms</a></li>
                <li><a href="requests.php">Requests</a></li>
                <li><a href="../src/php/signout_action.php">Sign Out</a></li>
            </ul>
            <button class = "btnNav" type="button" href="booking.php" onclick = "window.location.href =  'booking.php'">
                Book
            </button>
        </nav>
        <center>
        <div class="jumbotron" style="height: 50vh !important; width: 30% !important; background-color: rgba(0,0,0,0.2),rgba(0,0,0,0.2) !important; margin-top: 150px; color: orangered;">
            <h1 style="font-family:'Bradley Hand ITC', cursive; font-size:130px;">TOMASA</h1>
            <p class="lead" style="font-family:Courier New, Courier, monospace; color: white;;">
                Your Gateway to Serenity
            </p>
            <h4 style = "background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)); margin-left:120px; margin-right:120px; border-radius:20px; color:white;">Welcome, <span style="color:orangered; font-style: italic;"><?php echo $_SESSION["user_name"];?></span></h4>
            <br>
            <p><a href="about.php" class="btn btn-outline-dark" style="width: 160px; height: 40px; color: white;">Learn more &raquo;</a></p>
        </div>
    </center>
    </div>

    


</body>





</html>