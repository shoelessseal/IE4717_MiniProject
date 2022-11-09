<?php
session_start();
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
echo $email;
$to = ''.$email.'';

$seats = $_SESSION["seats"];
$addToCartDate = $_SESSION["addToCartDate"];
$showDate = $_SESSION["showDate"];
$totalPrice = $_SESSION["totalPrice"];
$locationAndTime = $_SESSION["locationAndTime"];
$movieName = $_SESSION["movieName"];
$ticketQty = $_SESSION["ticketQty"];

$seats = str_replace("\"", "", $seats);
$seats = str_replace("[", "", $seats);
$seats = str_replace("]", "", $seats);
$seats = str_replace(",", ", ", $seats);

// subject
$subject = 'Ticket Confirmation';

// message
$message = '
<html>
<head>
  <title>Ticket Confirmation</title>
</head>
<style>
body{
    background-color: #061018;
    min-height: 100px;
    color: #ffffff;
    }
table{
    padding: 20px;
    border-collapse: collapse;
}
th, td{
    padding: 10px;
    border: 1px solid white;
}
th {
    background-color: #e45d31;
}
</style>
<body>
  <p>Tickets bought: </p>
  <table>
    <tr>
      <th>Movie Name</th><th>Location And Time</th><th>Show Date</th><th>Seats</th>
    </tr>';

    for($i = 0; $i <count($movieName); $i++){
    $message .="\n<tr>
    <td>".$movieName[$i]."</td>
    <td>".$locationAndTime[$i]."</td>
    <td>".$showDate[$i]."</td>
    <td>".$seats[$i]."</td>
</tr>";
}

$message .= "\n</table>";
$message .= "\n</body>";
$message .= "\n</html>";

echo $message;
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

// Additional headers
$headers .= 'From: JKLC@localhost';
echo $headers;
// Mail it
echo ("mail set to:" .$to);
mail($to, $subject, $message, $headers);


$date = date('y-m-d');

print_r($date);

for($j = 0; $j < count($movieName); $j++){
    $insert = "INSERT into confirmedPurchases values
    ('NULL', '".$name."', '".$email."', '".$date."', '".$movieName[$j]."', '".$locationAndTime[$j]."', '".$showDate[$j]."', '".$seats[$j]."', '".$ticketQty[$j]."', '".$totalPrice[$j]."')"; 
    
    $result = $db->query($insert);
    if ($result) {
        echo  $db->affected_rows." order inserted into database.";
    } else {
        echo "An error has occurred.  The item was not added.";
    }

    $seatArr = explode(", ", $seats[$j]);

    print_r($seatArr);

    for($x = 0; $x < count($seatArr); $x++){
        $query = "INSERT into seatings values
        ('NULL', '".$movieName[$j]."', '".$locationAndTime[$j]."', '".$seatArr[$x]."')";
        $result = $db->query($query);
        if ($result) {
            echo  $db->affected_rows." seats inserted into database.";
        } else {
            echo "An error has occurred.  The item was not added.";
        }
    }
    
}


$db->close();
session_unset();
session_destroy();
?>