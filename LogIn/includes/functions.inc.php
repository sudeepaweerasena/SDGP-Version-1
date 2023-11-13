<?php

function emptyInputSignup($name, $email, $userName, $pwd, $pwdRepeat){
    $result=true;
    if(empty($name)||empty($email)||empty($userName)||empty($pwd)||empty($pwdRepeat)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;   
}

function invaliduName($userName){
    $result=true;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;   
}

function invalidemail($email){
    $result=true;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){  //FILTER_VALIDATE_EMAILwas a building function
        $result = true;
    }else{
        $result = false;
    }
    return $result;   
}

function pwdMatch($pwd, $pwdRepeat){
    $result=true;
    if($pwd != $pwdRepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;   
}

function uidExists($conn, $email, $userName){
    $sql = "SELECT * FROM user WHERE usersUid = ?  OR  usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:../signin.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $userName, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $userName, $pwd){
    $sql = "INSERT INTO user (usersName, usersEmail, usersUid, usersPwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:../signin.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); //building function ekak
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $userName, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../signup.php?error=none");
    exit();
}
?>