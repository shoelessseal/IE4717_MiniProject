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

$query_get = "SELECT movieName, locationAndTime, showDate, Seats from shoppingCart";
$query_result  = mysqli_query($db, $query_get);

$email =$_POST["email"];
$name = $_POST["name"];
echo $email;
$to = ''.$email.'';
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

while($row = $query_result->fetch_assoc()){
    $message .="\n<tr>
    <td>".$row["movieName"]."</td>
    <td>".$row["locationAndTime"]."</td>
    <td>".$row["showDate"]."</td>
    <td>".$row["Seats"]."</td>
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

//BLACK ADAM
$query_get = "SELECT SUM(ticketQty) from shoppingCart WHERE movieName='Black Adam'";
$query_result  = mysqli_query($db, $query_get);
$blackAdamQtyArr = $query_result ->fetch_array();
print_r($blackAdamQtyArr);
if(isset($blackAdamQtyArr)){
    $blackAdamQty = $blackAdamQtyArr[0];
    echo($blackAdamQty);
}else{
    $blackAdamQty = 0;
}


$query_get = "SELECT price from movies WHERE movieName='Black Adam'";
$query_result  = mysqli_query($db, $query_get);
$blackAdamPrice = $query_result ->fetch_array();

$blackAdamTotalPrice = $blackAdamQty * $blackAdamPrice[0];

//SPIDERMAN
$query_get = "SELECT SUM(ticketQty) from shoppingCart WHERE movieName='Spider-Man: No Way Home'";
$query_result  = mysqli_query($db, $query_get);
$spiderManQtyArr = $query_result ->fetch_array();
if(isset($spiderManQtyArr)){
    $spiderManQty = $spiderManQtyArr[0];
}else{
    $spiderManQty = 0;
}


$query_get = "SELECT price from movies WHERE movieName='Spider-Man: No Way Home'";
$query_result  = mysqli_query($db, $query_get);
$spiderManPrice = $query_result ->fetch_array();

$spiderManTotalPrice = $spiderManQty * $spiderManPrice[0];

//TOP GUN
$query_get = "SELECT SUM(ticketQty) from shoppingCart WHERE movieName='Top Gun: Maverick'";
$query_result  = mysqli_query($db, $query_get);
$TopGunQtyArr = $query_result ->fetch_array();
if(isset($TopGunQtyArr)){
    $TopGunQty = $TopGunQtyArr[0];
}else{
    $TopGunQty = 0;
}


$query_get = "SELECT price from movies WHERE movieName='Top Gun: Maverick'";
$query_result  = mysqli_query($db, $query_get);
$TopGunPrice = $query_result ->fetch_array();

$TopGunTotalPrice = $TopGunQty * $TopGunPrice[0];

//WEREWOLF
$query_get = "SELECT SUM(ticketQty) from shoppingCart WHERE movieName='Werewolf by Night'";
$query_result  = mysqli_query($db, $query_get);
$werewolfQtyArr = $query_result ->fetch_array();
if(isset($werewolfQtyArr)){
    $werewolfQty = $werewolfQtyArr[0];
}else{
    $werewolfQty = 0;
}


$query_get = "SELECT price from movies WHERE movieName='Werewolf by Night'";
$query_result  = mysqli_query($db, $query_get);
$werewolfPrice = $query_result ->fetch_array();

$werewolfTotalPrice = $werewolfQty * $werewolfPrice[0];

$TotalPrice = $blackAdamTotalPrice + $spiderManTotalPrice + $TopGunTotalPrice + $werewolfTotalPrice;

$date = date('yyyy-mm-dd');

$insert = "INSERT into confirmedPurchases values
    ('NULL', '".$name."', '".$email."', '".$date."', '".$blackAdamQty."', '".$spiderManQty."', '".$TopGunQty."', '".$werewolfQty."', '".$TotalPrice."')"; 
    
$result = $db->query($insert);
if ($result) {
     echo  $db->affected_rows." order inserted into database.";
} else {
    echo "An error has occurred.  The item was not added.";
}
$drop = "Drop Table shoppingCart";
$query_result  = mysqli_query($db, $drop);
$sql ="create table shoppingCart
(
	itemID int unsigned not null auto_increment primary key,
	movieName char(50) not null,
	locationAndTime char(75) not null,
	showDate date not null,
	Seats char(80) not null,
	ticketQty int unsigned not null,
	totalPrice float(4,2) not null 
)";
$query_result  = mysqli_query($db, $sql);

$db->close();
?>