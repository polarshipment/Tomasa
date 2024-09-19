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
<style>
  
</style>


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

    <h2 style = "color:white; font-size:70px; text-align:center; margin-top:50px;">Customer <span style ="color: orangered;">Details</span></h2>
    <div class="container" style = "margin-top:20px; color: white; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)); padding-top:20px; padding-bottom:15px; border-radius: 20px;">
        <?php
                    if(isset($_SESSION['user_email'])){
                        $resID = $_GET['id'];
                        $query = "SELECT archive.*, users.*
                                FROM archive
                                INNER JOIN users ON archive.user_id = users.id
                                WHERE archive.user_id = $resID";

                        $result = mysqli_query($con, $query);
                    
                        if(mysqli_num_rows($result) == 0){
                            echo "No user found for the reservation ID.";
                        } else {
                            $row = mysqli_fetch_assoc($result);
                            echo "User ID: " . $row['id'] . "<br>";
                            echo "First Name: " . $row['fname'] . "<br>";
                            echo "Last Name: " . $row['lname'] . "<br>";
                            echo "Email: " . $row['email'] . "<br>";
                        }
                    }  
        ?>
































    </div>
</body>
</html>