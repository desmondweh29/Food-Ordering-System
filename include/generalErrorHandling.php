
<?php

function emptyInput($email,$password){

    if (empty($email)||empty($password)) {
        return true;
    }else{
        return false;
    }
}

//checks if the inserted input is an email or not
function invalidInput($email){
    $pattern = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,})$/i";
    if(!preg_match($pattern,$email)){
        return true;
    }else{
        return false;
    }
}

function fetchUIDPass($conn,$email){
    //change this to new db when done
    $sql = "SELECT * FROM admins WHERE adminUID = ? ;";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$email);
    $stmt->execute();
    $result = mysqli_stmt_get_result($stmt);
    printf("%d row affected.\n", mysqli_stmt_affected_rows($stmt));
    if($row = mysqli_fetch_assoc($result)){

        return $row;
    }else{

        return false;
    }
    mysqli_stmt_close($stmt);
}

function loginUser($conn,$email,$password){
    $UIDarray=fetchUIDPass($conn,$email);
    if($UIDarray === false){
        header("location: ../login.php?error=login");
        exit();
    }
    $UPass = $UIDarray["adminPass"];
    print_r($UIDarray);
    if($password == $UPass){
        session_start();
        $_SESSION["adminID"] = $UIDarray["adminID"];
        header("location: ../index.php");
        exit();
    }else{
        header("location: ../login.php?error=InvalidPassword");
        exit();

    }
}

function registerUser($conn,$email,$password){
    $UIDarray = fetchUIDPass($conn,$email);
    if(!empty($UIDarray)){
        header("location: ../login.php?error=useralreadyexist");
        exit();
    }
    //change this to new db when done
    $sql = "INSERT INTO admins (adminUID,adminPass) values (?,?) ;";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$email,$password);
    $stmt->execute();
    mysqli_stmt_close($stmt);
    header("location: ../index.php");
    exit();
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