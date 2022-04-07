<?php
session_start();
require_once 'db_handler.php';
$accountID = $_SESSION['accountID'];

if (isset($_POST["orderNow"])) {

    //get food info from cart
    $query = "SELECT * FROM cart WHERE accountID = $accountID;";

    // execute the query
    if(!($result = mysqli_query($conn, $query)))
    {
        echo "<p>Could not execute query</p>";
        die(mysqli_error($conn) . "</body></html>");
    }

    if (mysqli_num_rows($result) == 0)
    {
        header("location: ../menu.php?error=noorderplaced");    
    }
    else
    {
        header("location: ../checkout-form.php");
    }

}

if (isset($_POST["clearList"])) {

    //get food info from cart
    $query = "SELECT * FROM cart WHERE accountID = $accountID;";

    // execute the query
    if(!($result = mysqli_query($conn, $query)))
    {
        echo "<p>Could not execute query</p>";
        die(mysqli_error($conn) . "</body></html>");
    }

    if (mysqli_num_rows($result) == 0)
    {
        header("location: ../menu.php?error=noordertoclear");    
    }
    else
    {
        $sql_delete = "DELETE FROM cart WHERE accountID = '$accountID'";
        $result=mysqli_query($conn,$sql_delete);
        header("location: ../menu.php");
    }
}