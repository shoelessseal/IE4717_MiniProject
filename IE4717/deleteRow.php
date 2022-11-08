<?php
session_start();
$seats = $_SESSION["seats"];
$addToCartDate = $_SESSION["addToCartDate"];
$showDate = $_SESSION["showDate"];
$totalPrice = $_SESSION["totalPrice"];
$locationAndTime = $_SESSION["locationAndTime"];
$movieName = $_SESSION["movieName"];
$ticketQty = $_SESSION["ticketQty"];

$rowCount = $_POST["rowNum"];
$rowCount = $rowCount -1;

//from deleted row shift every row forward by 1
for($i = $rowCount; $i < count($movieName); $i++){
    $seats[$i] = $seats[$i + 1];
    $addToCartDate[$i] = $addToCartDate[$i + 1];
    $showDate[$i] = $showDate[$i + 1];
    $totalPrice[$i] = $totalPrice[$i + 1];
    $locationAndTime[$i] = $locationAndTime[$i + 1];
    $movieName[$i] = $movieName[$i + 1];
    $ticketQty[$i] = $ticketQty[$i + 1];
}

//remove last row
unset($seats[count($seats) - 1]);
unset($addToCartDate[count($addToCartDate) - 1]);
unset($showDate[count($showDate) - 1]);
unset($totalPrice[count($totalPrice) - 1]);
unset($locationAndTime[count($locationAndTime) - 1]);
unset($movieName[count($movieName) - 1]);
unset($ticketQty[count($ticketQty) - 1]);

//update session arrays
$_SESSION["seats"] = $seats;
$_SESSION["addToCartDate"] = $addToCartDate;
$_SESSION["showDate"] = $showDate;
$_SESSION["totalPrice"] = $totalPrice;
$_SESSION["locationAndTime"] = $locationAndTime;
$_SESSION["movieName"] = $movieName;
$_SESSION["ticketQty"] = $ticketQty;

?>