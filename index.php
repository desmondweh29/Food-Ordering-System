<?php
    session_start();
    include_once 'header.php';
?>

<!-- <!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">

        <title>Insert something here</title>


        <div id="navbar">
            <a href="login.php" class="navlink">login</a>
            <a href="./include/logout.php">logout</a>
        </div>

        <div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Select Image File:</label>
        <input type="file" name="image">
         <input type="submit" name="submit" value="Upload">
        </form>
        </div>
    </head>



    <body> -->
    <?php
        if(isset($_SESSION["email"])){
        echo"<p> HELLO USER ID ". $_SESSION["email"] . "</p>";
        }else{
            echo"ITDIDNOTWORK";
        }
    ?>
    
<?php
    include_once 'footer.php';
?>