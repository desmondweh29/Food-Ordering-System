<?php

if(isset($_POST["login"])){
    $name=$_POST["name"];
    $password=$_POST["pass"];


    require_once 'db_handler.php';
    require_once 'generalErrorHandling.php';

    if(invalidInput($name) != false){
        header("location: ../adminlogin.php?error=invalidEmail");
        exit();
    }

    if (emptyInput($name,$password) != false) {
        header("location: ../adminlogin.php?error=emptyInput");
        exit();
    }
    
    loginUser($conn,$name,$password);

}else if(isset($_POST["register"])){

    $name=$_POST["name"];
    $password=$_POST["pass"];
    require_once 'db_handler.php';
    require_once 'generalErrorHandling.php';
    
    if (emptyInput($name,$password) != false) {
        header("location: ../adminlogin.php?error=emptyInput");
        exit();
    }
    registerUser($conn,$name,$password);
}
else{
    header("location: ../adminlogin.php");
    exit();
}
