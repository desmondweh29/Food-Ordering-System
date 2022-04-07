<?php
    session_start();
    require_once 'db_handler.php';
    $userID = $_SESSION["accountID"];
    $email = $_SESSION["email"];
    //$cprice = $_SESSION["cprice"];
    //$cfoodID = $_SESSION["menuID"];

    $cname = $_POST["cname"];
    $cnum = $_POST["cnum"];
    //$type = $_POST["type"];
    // $caddress = $_POST["caddress"];
    // $cdate = $_POST["cdate"];
    // $ctime = $_POST["ctime"];

    $cremark = $_POST["cremark"];

    // $sqlquery = "INSERT INTO food_order
    // (email,customer_name,telno,type,address,date,time,food,price,remarks,accountID) VALUES
    // ('$email','$cname','$cnum','$type','$caddress','$cdate','$ctime','$cfood','$cprice','$cremark','$userID')
    // ";

    if(isset($_POST["makeOrder"])){
        if (isset($_POST["typeOption"])&&$_POST["typeOption"]=="takeAway") {
            $type = "takeAway";
        }else{
            $type = "delivery";
        }

        $sqlquery = "INSERT INTO food_order
        (email,customer_name,telno,type,remarks,accountID) VALUES
        ('$email','$cname','$cnum','$type','$cremark','$userID')
        ";
        $orderResult = mysqli_query($conn,$sqlquery);
        header("location: ../checkout-form.php?error=succssful");
    }elseif (isset($_POST["back"])) {
       header("location: /");//goback to cart?
    }
