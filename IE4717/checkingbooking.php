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
                    <a href="shoppingCart.php" > Cart</a>
                    <a href="checkbooking.html" class="selected" > Check Booking</a>
                    <a href="contactus.html" > Contact us</a>
                </div>
            </nav>
        </header>
        <main class="mainclasscontainer">
            <div class="leftsidecontainer">
                <h2 style=" font-size: xx-large">Check movie bookings</h2>
                <br>
                <table border: 1>
                    <thead>
                        <tr>
                            <th>Movie Name</th>
                            <th>Location And Time</th>
                            <th>Show Date</th>
                            <th>Seats</th>
                            <th>Ticket Quantity</th>
                            <th>Date Purchased</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
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
                        
                        $email =$_POST["email"];
                        $name = $_POST["name"];

                        $query_get = "SELECT movieName, locationAndTime, showDate, Seats, ticketQty, datePurchased, totalPrice FROM confirmedPurchases WHERE customerName= '$name' AND customerEMAIL= '$email'";
                        $query_result  = $db -> query($query_get);
                        
                        while($row = $query_result -> fetch_assoc()){
                            echo "<tr>
                                <td>{$row['movieName']}</td>
                                <td>{$row['locationAndTime']}</td>
                                <td>{$row['showDate']}</td>
                                <td>{$row['Seats']}</td>
                                <td>{$row['ticketQty']}</td>
                                <td>{$row['datePurchased']}</td>
                                <td>{$row['totalPrice']}</td>
                            </tr>";
                        }
                        $db->close();
                        ?>  
                    </tbody>
                </table>
            </div>
          </main>
</body>