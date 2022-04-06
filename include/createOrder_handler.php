<?php
session_start();
    require_once 'db_handler.php';

    $userID = $_SESSION["accountID"];
    $email = $_SESSION["email"];

    $cname = $_POST["cname"];
    $cnum = $_POST["cnum"];
    $type = $_POST["type"];
    $caddress = $_POST["caddress"];
    $cdate = $_POST["cdate"];
    $ctime = $_POST["ctime"];
    $cfood = $_POST["cfood"];
    $cprice = $_POST["cprice"];
    $cremark = $_POST["cremark"];

    $sqlquery = "INSERT INTO food_order
    (email,customer_name,telno,type,address,date,time,food,price,remarks,accountID) VALUES
    ('$email','$cname','$cnum','$type','$caddress','$cdate','$ctime','$cfood','$cprice','$cremark','$userID')
    ";

    $orderResult = mysqli_query($conn,$sqlquery);

    if ($orderResult == true){
        //confirmation ?
        //this is just a placeholder
        header('location: ../ordertest.php?error=holyshit');
    }else{
        //failed to order
        //redirection?
    }