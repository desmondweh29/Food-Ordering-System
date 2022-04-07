<?php
session_start();
require_once 'db_handler.php';
$userID = $_SESSION['accountID'];


if (isset($_POST["orderNow"])) {
    header("location: ../checkout.php");
}
if (isset($_POST["clearList"])) {
    $sql_delete = "DELETE FROM cart WHERE accountID = '$userID'";
    $result=mysqli_query($conn,$sql_delete);
    header("location: ../menu.php");
}