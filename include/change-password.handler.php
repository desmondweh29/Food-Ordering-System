<?php

if(isset($_POST["submit"])){
    $email = $_SESSION["email"];
    $password_current = $_POST["password_current"];
    $password_new = $_POST["password_new"];
    $password_confirm = $_POST["password_confirm"];
    require_once 'db_handler.php';
    require_once 'generalErrorHandling.php';

    if (emptyInputChangePassword($password_current,$password_new,$password_confirm) !== false) {
        header("location: ../change-password.php?error=emptyinput");
        exit();
    }
    if (invalidCurrentPassword($conn, $email, $password_current) !== false) {
        header("location: ../change-password.php?error=currentpasswordwrong");
        exit();
    }
    if (pwdMatch($password_new, $password_confirm) !== false) {
        header("location: ../change-password.php?error=passwordsdontmatch");
        exit();
    }

    changePassword($conn,$email,$password);
}
else
{
    header("location: ../change-password.php");
    //change pwd failed
    exit();
}