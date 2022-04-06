
<?php

$email = $_POST["email"];
$password = $_POST["password"];
$password_confirm = $_POST["password_confirm"];

function emptyInputRegister($email,$password, $password_confirm){

    if (empty($email)||empty($password)||empty($password_confirm)) {
        return true;
    }else{
        return false;
    }
}

//checks if the inserted input is an email or not
function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function pwdMatch($password, $password_confirm) {
    if ($password !== $password_confirm) {
        return true;
    }else{
        return false;
    }
}

function emailExists ($conn, $email) {
    $sql = "SELECT * FROM user_account WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$email);
    $stmt->execute();
    $resultData = mysqli_stmt_get_result($stmt);
    printf("%d row affected.\n", mysqli_stmt_affected_rows($stmt));
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
}

function registerUser($conn,$email,$password){

    $sql = "INSERT INTO user_account (email, password) VALUES (?,?) ;";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ss",$email,$hashedPwd);
    mysqli_stmt_execute($stmt);    
    mysqli_stmt_close($stmt);
    header("location: ../register-success.php");
    exit();
}

function emptyInputLogin($email,$password){

    if (empty($email)||empty($password)) {
        return true;
    }else{
        return false;
    }
}

function loginUser($conn,$email,$password){
    $emailExists=emailExists($conn,$email);
    if($emailExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true)
    {
        session_start();
        $_SESSION["accountID"] = $emailExists["accountID"];
        $_SESSION["email"] = $emailExists["email"];
        header("location: ../index.php");
        exit();
    }
}

function fetchtoken($conn,$email,$token,$newpass){
    //change this to new db when done
    $sql_query="SELECT email from password_reset where token = '$token'";
    $result = mysqli_query($conn,$sql_query);
    $email = mysqli_fetch_assoc($result)['email'];

        //add hashing function
        //change this to new db when done
        $sql2_query="UPDATE admins SET adminPass = '$newpass' where adminUID = '$email'";
        $result = mysqli_query($conn,$sql2_query);

}