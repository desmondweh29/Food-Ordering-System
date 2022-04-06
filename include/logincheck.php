<?php

if(isset($_POST["login"])){
    $email=$_POST["email"];


    require_once 'db_handler.php';
    require_once 'generalErrorHandling.php';

    if (emptyInputLogin($email,$password) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../login.php?error=invalidemail");
        exit();
    }
    
    loginUser($conn,$email,$password);

}else {
    header("location: ../login.php");
    exit();
    //loginfailed
}
