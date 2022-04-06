<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport">
    <title>Order</title>
</head>
<body>
    <form action="./include/createOrder_handler.php" method="POST" >
    <input type="text" name="cname">Name </input>
    <input type="text" name="cnum" >Contact Num </input>
    <input type="text" name="caddress" >Address </input>
    <input type="text" name="cfood">food </input>
    <input type="text" name="cprice" >price </input>
    <input type="text" name="cremark" > remark</input>
    <input type="date" name="cdate"
       value="2022-07-22"
       min="2022-01-01" max="2023-12-31">
       <input type="time" name="ctime"
       min="09:00" max="22:00" required>
    <button type="submit" name="submit">SUbMIT</button>
            <select name="type" >
            <option value="DineIn" selected>Dine In</option>
            <option value="TakeAway">TakeAway</option>

</select></form>
</body>
</html>