<?php 
session_start();
if(isset($_POST["addtoorder"])){
    $accountID = $_SESSION["accountID"];
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $category = $_POST["category"];
    $price = $_POST["price"];

    $price = $price * $quantity;
    
    require_once 'db_handler.php';
    require_once 'generalErrorHandling.php';


    addIntoCart($conn,$accountID,$name,$quantity,$category,$price);
}
else
{
    header("location: ../menu.php");
    //register failed
    exit();
}