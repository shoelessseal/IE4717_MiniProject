<?php
    print_r($_POST);
    $seats = $_POST["seats"];
    $addToCartDate = $_POST["addToCartDate"];
    $showDate = $_POST["showDate"];
    $totalPrice = $_POST["totalPrice"];
    $locationAndTime = $_POST["locationAndTime"];
    $movieName = $_POST["movieName"];
    $ticketQty = $_POST["ticketQty"];

    $servername = "localhost";
    $username = "f32ee";
    $password = "f32ee";
    $dbname = "JKLC";

    @ $db = new mysqli($servername, $username, $password, $dbname);
    if (mysqli_connect_error()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
    }    
    
    $query = "INSERT into shoppingCart values
        ('NULL', '".$movieName."', '".$locationAndTime."', '".$showDate."', '".$seats."', '".$ticketQty."', '".$totalPrice."')";
    $result = $db->query($query);
    if ($result) {
        echo  $db->affected_rows." order inserted into database.";
    } else {
        echo "An error has occurred.  The item was not added.";
    }
    $db->close();
?>
