
<?php

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

function emptyInputForgetPassword ($email)
{
    if (empty($email)) {
        return true;
    }else{
        return false;
    }
}

function emptyInputResetPassword($password, $password_confirm) 
{
    if (empty($password) || empty($password_confirm)) {
        return true;
    }else{
        return false;
    }
}

function fetchtoken($conn,$email,$token,$password){
    // select email that matches the token
    $sql_query = "SELECT email from password_reset where token = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql_query)){
        header("location: reset-password.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$token);
    mysqli_stmt_execute($stmt);  

    // check if email of that token exist in db
    $resultData = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($resultData) == 0) {
        header("location: reset-password.php?error=tokenexpired");
        exit();
    } 


    $email = mysqli_fetch_assoc($resultData)['email'];

    // update the password
    $sql_query2 = "UPDATE user_account SET password = ? where email = '$email'";
    $stmt2 = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt2,$sql_query2)){
        header("location: reset-password.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt2,"s",$hashedPwd);
    mysqli_stmt_execute($stmt2);  


    //deleting the token from database after password reset
    $sql_query3 = "DELETE FROM password_reset where token = ?;";
    $stmt3 = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt3,$sql_query3)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt3,"s",$token);
    mysqli_stmt_execute($stmt3);    

    //closing statements
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);
    mysqli_stmt_close($stmt3);
    header("location: reset-success.php");
    exit();

}