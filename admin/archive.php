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
a, a:hover{
    color: white;
    text-decoration: none;
}
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

    <h2 style = "color:white; font-size:70px; text-align:center; margin-top:50px;">Archives <span style ="color: orangered;">Status</span></h2>
    <div class="container" style = "margin-top:20px; color: white; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)); padding-top:20px; padding-bottom:15px; border-radius: 20px;">
        <?php
                    if(isset($_SESSION['user_email'])){
                        
                        $mey = "SELECT `resID`,`user_id`, `customer`, `contact`, `adults`, `kids`, `room_type`, `date_in`, `date_out`, `status` FROM `archive`";
                        $res = mysqli_query($con,$mey);
                        
                        if(mysqli_num_rows($res)==0){
                            echo "No archived request.";
                        }
                        else{
                            echo "<table class='table table-bordered table-striped' >";
                            echo "<tr>";

                            echo "<th style = 'color:orangered;'>"; echo "Reservation ID";  echo "</th>";
                            echo "<th style = 'color:orangered;'>"; echo "Customer";  echo "</th>";
                            echo "<th style = 'color:orangered;'>"; echo "Contact";  echo "</th>";
                            echo "<th style = 'color:orangered;'>"; echo "Status";  echo "</th>";
                            echo "</tr>";	
                
                            while($row=mysqli_fetch_assoc($res)){
                                echo "<tr>";
                                echo "<td style = 'color:white;'>"; 
                                echo "<a href='archive_room_details.php?id=".$row['resID']."'>".$row['resID']."</a>"; 
                                echo "</td>";

                                //echo "<td style = 'color:white;'>"; echo $row['resID']; echo "</td>";

                                echo "<td style = 'color:white;'>"; 
                                echo "<a href='customer_archive_details.php?id=".$row['user_id']."'>".$row['customer']."</a>"; 
                                echo "</td>";
                                echo "<td style = 'color:white;'>"; echo $row['contact']; echo "</td>";
                                echo "<td style = 'color:white;'>"; echo $row['status']; echo "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                    }        
        ?>