<?php

function emptyInput($name,$password){

    if (empty($name)||empty($password)) {
        return true;
    }else{
        return false;
    }
}

function invalidUIDandPassword($name,$password){

}

function invalidInput($name,$password){
    if(!preg_match("/^[a-zA-Z0-9]*S/",$name) || !preg_match("/^[a-zA-Z0-9]*S/",$password)){
        return true;
    }else{
        return false;
    }
}

function fetchUIDPass($conn,$username,$password){
    $sql = "Select * from admins where adminID = ? AND adminPass = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../adminlogin.html?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$password);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
}

function validateUIDPass($conn,$username,$password){
    $UIDPass=fetchUIDPass($conn,$username,$password);
    if($UIDPass == false){
        header("location: ../adminlogin.html?error=loginfailed");
        exit();
    }

}