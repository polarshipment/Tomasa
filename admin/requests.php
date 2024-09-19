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

    <h2 style = "color:white; font-size:70px; text-align:center; margin-top:50px;">Reservation <span style ="color: orangered;">Status</span></h2>
    <div class="container" style = "margin-top:20px; color: white; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)); padding-top:20px; padding-bottom:15px; border-radius: 20px;">
        <?php
                    if(isset($_SESSION['user_email'])){
                        
                        $mey = "SELECT `resID`, `customer`, `contact`, `adults`, `kids`, `room_type`, `date_in`, `date_out`, `status` FROM `reservation`";
                        $res = mysqli_query($con,$mey);
                        
                        if(mysqli_num_rows($res)==0){
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
                                echo "<td style = 'color:white;'>"; 
                                echo "<a href='customer_details.php?id=".$row['resID']."'>".$row['customer']."</a>"; 
                                echo "</td>";
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
                        <div class="srch" style="text-align:center; padding-top:20px;">
                                <form class="navbar-form" method="post" name="form1">
                                        <div>
                                            <input type="text" name="resID" placeholder="Reservation ID" required><br><br>
                                            <button type="submit" name="submit" type="submit" class = "btn btn-outline-light">
                                                Approve Reservation
                                            </button>
                                            <button type="submit" name="deny" type="submit" class = "btn btn-outline-light">
                                                Deny Reservation
                                            </button>
                                            <button type="submit" name="checkin" type="submit" class = "btn btn-outline-light">
                                                Check In
                                            </button>
                                            <button type="submit" name="delete" type="submit" class = "btn btn-outline-light">
                                                Archive Reservation
                                            </button>
                                        </div>
                                </form>
                            <?php
                            if(isset($_POST['submit']))
                            {
                    
                                $_SESSION['resID']= $_POST['resID'];  
                                mysqli_query($con, "UPDATE reservation SET status = 'Approved' where resID='$_POST[resID]'");
                                echo '<script type="text/javascript">window.location="requests.php";</script>';
                            }
                            if(isset($_POST['deny']))
                            {
                                
                                $_SESSION['resID']= $_POST['resID'];  
                                mysqli_query($con, "UPDATE reservation SET status = 'Denied' where resID='$_POST[resID]'");
                                echo '<script type="text/javascript">window.location="requests.php";</script>';
                            }
                            if(isset($_POST['checkin'])) {

                                $_SESSION['resID'] = $_POST['resID'];
                                $currentTime = date("Y-m-d H:i:s"); 
                                mysqli_query($con, "UPDATE reservation SET status = 'Checked in: $currentTime' where resID='$_POST[resID]'");
                                echo '<script type="text/javascript">window.location="requests.php";</script>';
                            }
                            if(isset($_POST['delete']))
                            {
                                
                                // $_SESSION['resID']= $_POST['resID'];  
                                // mysqli_query($con, "DELETE FROM reservation WHERE resID='$_POST[resID]'");
                                // echo '<script type="text/javascript">window.location="requests.php";</script>';

                                $resID = $_POST['resID'];
    
                                $selectQuery = "SELECT * FROM reservation WHERE resID='$resID'";
                                $result = mysqli_query($con, $selectQuery);
                                
                                if(mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $currentTime = date("Y-m-d H:i:s"); 
                                    $status = "Checked out: $currentTime"; 
                                    $insertQuery = "INSERT INTO archive (resID, user_id, customer, contact, adults, kids, room_type, date_in, date_out, status) 
                                                    VALUES ('$row[resID]', '$row[user_id]', '$row[customer]', '$row[contact]', '$row[adults]', '$row[kids]', '$row[room_type]', '$row[date_in]', '$row[date_out]', '$status')";
                                    mysqli_query($con, $insertQuery);
                                
                                    $deleteQuery = "DELETE FROM reservation WHERE resID='$resID'";
                                    mysqli_query($con, $deleteQuery);
                                
                                    echo '<script>window.location="archive.php";</script>';
                                }
                            }
                            
                            ?>
                        </div>

































    </div>
</body>
</html>