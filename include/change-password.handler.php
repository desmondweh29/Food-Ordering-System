<?php

session_start();
include_once 'db_handler.php';
$email = $_SESSION["email"];

if(isset($_POST["submit"])){
    $password_current = $_POST["password_current"];
    $password_new = $_POST["password_new"];
    $password_confirm = $_POST["password_confirm"];
    // require_once 'db_handler.php';
    require_once 'generalErrorHandling.php';

    if (emptyInputChangePassword($password_current,$password_new,$password_confirm) !== false) {
        header("location: ../change-password.php?error=emptyinput");
        exit();
    }
    
    //check for whether current password is correct
    checkCurrentPassword($conn, $email, $password_current);

    if (pwdMatch($password_new, $password_confirm) !== false) {
        header("location: ../change-password.php?error=passwordsdontmatch");
        exit();
    }
    
    changePassword($conn,$email,$password_new);
}
else
{
    header("location: ../change-password.php");
    //change pwd failed
    exit();
}