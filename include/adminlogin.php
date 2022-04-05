<?php

if(isset($_POST["login"])){
    $name=$_POST["name"];
    $password=$_POST["pass"];

    require_once 'db_handler.php';
    require_once 'generalErrorHandling.php';

    if (emptyInput($name,$password) != false) {
        header("location: ../adminlogin.html?error=emptyInput");
        exit();
    }

    if(invalidInput($name,$password) != false){
        header("location: ../adminlogin.html?error=invalidInput");
        exit();
    }
    
    validateUIDPass($conn,$name,$password);
}else{
    header("location: ../adminlogin.html");
    exit();
}
