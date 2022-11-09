<?php
    session_start();
    
    if(!isset($_SESSION['seats'])){
        $_SESSION['seats'] = array();
    }
    if(!isset($_SESSION['addToCartDate'])){
        $_SESSION['addToCartDate'] = array();
    }
    if(!isset($_SESSION['showDate'])){
        $_SESSION['showDate'] = array();
    }
    if(!isset($_SESSION['totalPrice'])){
        $_SESSION['totalPrice'] = array();
    }
    if(!isset($_SESSION['locationAndTime'])){
        $_SESSION['locationAndTime'] = array();
    }
    if(!isset($_SESSION['movieName'])){
        $_SESSION['movieName'] = array();
    }
    if(!isset($_SESSION['ticketQty'])){
        $_SESSION['ticketQty'] = array();
    }

    $seats = $_POST["seats"];
    $addToCartDate = $_POST["addToCartDate"];
    $showDate = $_POST["showDate"];
    $totalPrice = $_POST["totalPrice"];
    $locationAndTime = $_POST["locationAndTime"];
    $movieName = $_POST["movieName"];
    $ticketQty = $_POST["ticketQty"];

    $seats = str_replace("\"", "", $seats);
    $seats = str_replace("[", "", $seats);
    $seats = str_replace("]", "", $seats);
    //push to array
    array_push( $_SESSION['seats'], $_POST["seats"]);
    array_push( $_SESSION['addToCartDate'], $_POST["addToCartDate"]);
    array_push( $_SESSION['showDate'], $_POST["showDate"]);
    array_push( $_SESSION['totalPrice'], $_POST["totalPrice"]);
    array_push( $_SESSION['locationAndTime'], $_POST["locationAndTime"]);
    array_push( $_SESSION['movieName'], $_POST["movieName"]);
    array_push( $_SESSION['ticketQty'], $_POST["ticketQty"]);

    $db->close();
?>
