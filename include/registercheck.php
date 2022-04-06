<?php

if(isset($_POST["register"])){
    $name=$_POST["email"];
    $password=$_POST["password"];
    $password_confirm=$_POST["password_confirm"];
    require_once 'db_handler.php';
    require_once 'generalErrorHandling.php';

    if (emptyInputRegister($name,$password,$password_confirm) !== false) {
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../register.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($password, $password_confirm) !== false) {
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }
    if (emailExists($conn, $email) !== false) {
        header("location: ../register.php?error=emailtaken");
        exit();
    }

    registerUser($conn,$name,$password);
}
else
{
    header("location: ../register.php");
    //register failed
    exit();
}