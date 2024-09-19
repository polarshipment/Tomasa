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
    <title>Booking</title>
    <link rel = "stylesheet" type = "text/css" href ="../src/css/nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
<style>
    td{
        padding: 0 15px;
        color:orangered;
    }

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


        <center>
<div class = "container" style="margin-top:90px; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)); border-radius: 10px; padding-bottom:5px;">
        <div class = "login-box">
        <div class = "row">
        <div class = "col-md-6 login-left" style = "color: white;">
            <h2 style="color:white; padding-top:20px; padding-bottom:20px; font-size:45px;"> Request <span style="color:orangered;">Reservation</span></h2>
            <table class="table">
            <form action="" method="post" style="">
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="customer" class="form" placeholder="Name" required=""></td>
                    </tr>
                    <tr>
                        <td>Contact Number:</td>
                        <td><input type="text" name="contact" class="form" placeholder="Contact" required=""></td>
                    </tr>
                    <tr>
                        <td>No. of Adults:</td>
                        <td><input type="text" name="adults" class="form" placeholder="No. Of Adults" required=""></td>
                    </tr>
                    <tr>
                        <td>No. of kids:</td>
                        <td><input type="text" name="kids" class="form" placeholder="No. Of Kids" required=""></td>
                    </tr>
                    <tr>
                        <td>Date In:</td>
                        <td><input type="date" name="date_in" class="form" placeholder="Date In" required=""></td>
                    </tr>
                    <tr>
                        <td>Date Out:</td>
                        <td><input type="date" name="date_out" class="form" placeholder="Date Out" required=""></td>
                    </tr>
            </table>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="radio" value="Basic">Basic&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="radio" value="Group">Group&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="radio" value="Deluxe">Deluxe&nbsp;</td>
                        </tr>
                        <br><br>
                        <button class="btn btn-outline-light" type="submit" name="submit" style="text-align:center; ">Request Reservation</button>
            </form>
            <br>
            <br>
            
                <?php
                    // if(isset($_POST['submit'])){
                    //     if(isset($_SESSION['user_email']))
                    //     {
                    //         mysqli_query($con, "INSERT INTO `reservation`( `customer`, `contact`, `adults`, `kids`, `room_type`, `date_in`, `date_out`, `email`) VALUES ('$_POST[customer]', '$_POST[contact]', '$_POST[adults]', '$_POST[kids]', '$_POST[radio]', '$_POST[date_in]', '$_POST[date_out]', '$_SESSION[user_email]');");
                            
                    //     }        

                        if(isset($_POST['submit'])){
                            if(isset($_SESSION['user_email']))
                            {
                                $result = mysqli_query($con, "SELECT id FROM users WHERE email='$_SESSION[user_email]'");
                                $row = mysqli_fetch_array($result);
                                $user_id = $row['id'];
                                
                                mysqli_query($con, "INSERT INTO `reservation`(`user_id`, `customer`, `contact`, `adults`, `kids`, `room_type`, `date_in`, `date_out`, `email`) VALUES ('$user_id', '$_POST[customer]', '$_POST[contact]', '$_POST[adults]', '$_POST[kids]', '$_POST[radio]', '$_POST[date_in]', '$_POST[date_out]', '$_SESSION[user_email]');");
                            }    
                ?>

                <?php
                        
                        header('location:requests.php'); 
                        } 
                ?>
        </div>
        
        <div class = "col-md-6 login-right" style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)),url(../src/images/bookingbg.jpg); border-radius: 10px; background-size: cover; background-position: center;">
           
        </div>

                
    </div>
    </center>
    </div>

    


</body>





</html>