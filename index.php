<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">

        <title>Insert something here</title>


        <div id="navbar">
            <a href="adminlogin.php" class="navlink">login</a>
        </div>
    </head>



    <body>
    <?php
        if(isset($_SESSION["adminID"])){
        echo"<p> HELLO USER ID ". $_SESSION["adminID"] . "</p>";
        }else{
            echo"ITDIDNOTWORK";
        }
        ?>
    </body>
</html>