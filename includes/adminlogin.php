<?php

if(isset($_POST["login"])){
    $name=$_POST["name"];
    $password=$_POST["password"];

    require_once 'db_handler.php';
    require_once 'generalErrorHandling.php'

    if (condition) {
        # code...
    }

}else{
    header("location: ../adminlogin.html");
}