<?php
    session_start();
    //$cprice = $_SESSION["cprice"];
    //$cfoodID = $_SESSION["menuID"];
    // $totalPrice = $_SESSION['totalprice'];
    // $cname = $_POST["cname"];
    // $cnum = $_POST["cnum"];
    //$type = $_POST["type"];
    // $caddress = $_POST["caddress"];
    // $cdate = $_POST["cdate"];
    // $ctime = $_POST["ctime"];
    // $cremark = $_POST["cremark"];

    // $sqlquery = "INSERT INTO food_order
    // (email,customer_name,telno,type,address,date,time,food,price,remarks,accountID) VALUES
    // ('$email','$cname','$cnum','$type','$caddress','$cdate','$ctime','$cfood','$cprice','$cremark','$userID')
    // ";

    if(isset($_POST["makeOrder"])){
        
        $email = $_SESSION["email"];
        $customer_name = $_POST["customer_name"];
        $telno = $_POST["telno"];
        $type = $_POST["type"];
        $address = $_POST["address"];
    
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date = date("Y-m-d");
        $time = date("H:i:s");
    
        $remarks = $_POST["remarks"];
        $accountID = $_SESSION["accountID"];
        
        require_once 'db_handler.php';


        //get food info from cart
        $query = "SELECT * FROM cart WHERE accountID = $accountID;";

        // execute the query
        if(!($result = mysqli_query($conn, $query)))
        {
            echo "<p>Could not execute query</p>";
            die(mysqli_error($conn) . "</body></html>");
        }
        $price = 0;
        $food = "";
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $price = $price + $row["M_Price"];
            $food .= $row["M_Name"] . " (" . $row["M_Quantity"] . "); ";
        }


        $sql = "INSERT INTO food_order (email, customer_name, telno, type, address, date, time, food, price, remarks, accountID) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../checkout-form.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"sssssssssss",$email, $customer_name, $telno, $type, $address, $date, $time, $food, $price, $remarks, $accountID);
        mysqli_stmt_execute($stmt);    
        mysqli_stmt_close($stmt);

        // delete order from cart
        $sql_delete = "DELETE FROM cart WHERE accountID = '$accountID'";
        $result=mysqli_query($conn,$sql_delete);

        // retrieve the order id just now
        $receipt = "SELECT * FROM food_order 
                    WHERE accountID = $accountID
                    ORDER BY orderID DESC LIMIT 1;";

        if(!($result = mysqli_query($conn, $receipt)))
        {
            echo "<p>Could not execute query</p>";
            die(mysqli_error($conn) . "</body></html>");
        }
        $row = mysqli_fetch_assoc($result);
        $orderID = $row["orderID"];

        header("location: ../receipt.php?orderID=$orderID");
    }
    else
    {
        header("location: ../checkout-form.php");
        //checkout failed
        exit();
    }
