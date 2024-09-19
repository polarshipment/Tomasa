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

    <h2 style = "color:white; font-size:70px; text-align:center; margin-top:50px;">Reservation <span style ="color: orangered;">Details</span></h2>
    <div class="container" style = "margin-top:20px; color: white; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)); padding-top:20px; padding-bottom:15px; border-radius: 20px;">
        <?php
                    if(isset($_SESSION['user_email'])){
                        $reservation_id = $_GET['id'];
                        $query = "SELECT * FROM archive where resID='$reservation_id';";
                        $result = mysqli_query($con, $query);
                    
                        if(mysqli_num_rows($result) == 0){
                            echo "No user found for the reservation ID.";
                        } else {
                            $row = mysqli_fetch_assoc($result);
                            echo "User ID: " . $row['user_id'] . "<br>";
                            echo "Customer: " . $row['customer'] . "<br>";
                            echo "Adults: " . $row['adults'] . "<br>";
                            echo "Kids: " . $row['kids'] . "<br>";
                            echo "Room Type: " . $row['room_type'] . "<br>";
                            echo "Date In: " . $row['date_in'] . "<br>";
                            echo "Date Out: " . $row['date_out'] . "<br>";
                        }
                    }  
        ?>
































    </div>
</body>
</html>