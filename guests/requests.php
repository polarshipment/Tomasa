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
    <title>Requests</title>
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

    <h2 style = "color:white; font-size:70px; text-align:center; margin-top:90px;">Reservation <span style ="color: orangered;">Status</span></h2>
    <div class="container" style = "margin-top:20px; color: white; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)); padding-top:20px; padding-bottom:5px; border-radius: 20px;">
        <?php
                    if(isset($_SESSION['user_email'])){
                        
                        $res = mysqli_query($con, "SELECT * FROM reservation where email='$_SESSION[user_email]'; ");
                        $num = mysqli_num_rows($res);
                        
                        if($num==0){
                            echo "No pending request.";
                        }
                        else{
                            echo "<table class='table table-bordered table-striped' >";
                            echo "<tr>";
                
                            

                            echo "<th style = 'color:orangered;'>"; echo "Reservation ID";  echo "</th>";
                            echo "<th style = 'color:orangered;'>"; echo "Customer";  echo "</th>";
                            echo "<th style = 'color:orangered;'>"; echo "Contact";  echo "</th>";
                            echo "<th style = 'color:orangered;'>"; echo "No. of Adults";  echo "</th>";
                            echo "<th style = 'color:orangered;'>"; echo "No. of Kids";  echo "</th>";
                            echo "<th style = 'color:orangered;'>"; echo "Room Type";  echo "</th>";
                            echo "<th style = 'color:orangered;'>"; echo "Date In";  echo "</th>";
                            echo "<th style = 'color:orangered;'>"; echo "Date Out";  echo "</th>";
                            echo "<th style = 'color:orangered;'>"; echo "Status";  echo "</th>";
                            echo "</tr>";	
                
                            while($row=mysqli_fetch_assoc($res)){
                                echo "<tr>";
                                echo "<td style = 'color:white;'>"; echo $row['resID']; echo "</td>";
                                echo "<td style = 'color:white;'>"; echo $row['customer']; echo "</td>";
                                echo "<td style = 'color:white;'>"; echo $row['contact']; echo "</td>";
                                echo "<td style = 'color:white;'>"; echo $row['adults']; echo "</td>";
                                echo "<td style = 'color:white;'>"; echo $row['kids']; echo "</td>";
                                echo "<td style = 'color:white;'>"; echo $row['room_type']; echo "</td>";
                                echo "<td style = 'color:white;'>"; echo $row['date_in']; echo "</td>";
                                echo "<td style = 'color:white;'>"; echo $row['date_out']; echo "</td>";
                                echo "<td style = 'color:white;'>"; echo $row['status']; echo "</td>";
                                
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                    }        
        ?>
    </div>
































    </div>
</body>
</html>