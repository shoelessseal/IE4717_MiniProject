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

$rowCount = $_POST["rowNum"];
$rowCount = $rowCount -1;
$query = "SELECT itemID from shoppingCart order by itemID limit ".$rowCount.", 1";
$query_result  = mysqli_query($db, $query);

$index = $query_result ->fetch_array();

$query = "DELETE from shoppingCart where itemID = '".$index[0]."'";
$query_result  = mysqli_query($db, $query);
if($query_result){
    echo  $db->affected_rows." was deleted.";
} else {
    echo "An error has occurred.  The item was not deleted.";
}

$db->close();
?>