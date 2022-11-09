<?php
    $servername = "localhost";
    $username = "f32ee";
    $password = "f32ee";
    $dbname = "JKLC";

    @ $db = new mysqli($servername, $username, $password, $dbname);
    if (mysqli_connect_error()) {
         echo "Error: Could not connect to database.  Please try again later.";
         exit;
    }
    
    $db->close();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP project</title>
    <link rel="stylesheet" href="http://localhost:8000/IE4717/IE4717_MiniProject/IE4717/styles/checkbooking.css">
</head>
<body>
        <header>
            <nav>
                <h1 class="nav-heading">JKL Cinema</h1>
                <div class="nav-links">
                    <a href="Homepage.html" >Home</a>
                    <a href="cinemalocation.html" > Cinema Location</a>
                    <a href="shoppingCart.php"> Cart</a>
                    <a href="CheckingBooking.php" class="selected"> Check Booking</a>
                    <a href="contactus.html" > Contact us</a>
                </div>
            </nav>
        </header>
        <main class="shows-container">
            <div class="show-content">
                <div class="show-left-panel">
                    <h2>Check Booking</h2>
                    <br>
                    <br>
                    <form method="post">
                    <label for="name" style="margin-left: 10px">*Name: </label>
                    <input id="name" type="text" name="name" required placeholder="Enter your name here"/>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label for="">*Email: </label>
                    <input id="email" type="email" name="email" placeholder="Enter your Email-ID here" required/>
                    <br><br>
                    <input class="Checkbookingbtn" type="button" value="Check booking" onclick="" style="margin-left: 600px;">
                    </form>
                </div>
            </div>
        </main>
</body>
