<?php
if(isset($_POST["submit"])){   // when user enter sumbit button then he access to login.in.php page
    $name = $_POST["name"];  //get uName and store it on userName variable
    $email=$_POST["email"];
    $userName=$_POST["uName"];
    $pwd=$_POST["password"];
    $pwdRepeat=$_POST["RePassword"];

    //using dbh code block, so we can $conn varable on anywhere on this page
    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    $emptyInput = emptyInputSignup($name, $email, $userName, $pwd, $pwdRepeat);
    $invaliduName = invaliduName($userName);  // hari formate ekat username eka aawillada thiyenne kiyala balanawa
    $invalidemail = invaliduName($email); //hari formate ekata email eka awillada thiyenne kiyala balanawa
    $pwdMatch = pwdMatch($pwd, $pwdRepeat);//function eka creat karala thiyenne pwd ekai match pdw ekai samaanada kiyala balanna
    $uidExists= uidExists($conn, $userName, $email);  //user dan input karana user name eken saha email eken wenath accounts thibeda?

    if($emptyInput!==false){  //100% niwaradi userName ekai password hera wena monawa dunnth exit we.
        header("Location:../signup.php?error=emptyinput");
        exit();
    }

    if($invaliduName!==false){  
        header("Location:../signup.php?error=invaliduName");
        exit();
    }

    if($invalidemail!==false){ 
        header("Location:../signup.php?error=invalidemail");
        exit();
    }

    if($pwdMatch!==false){  
        header("Location:../signup.php?error=passworddoesn'tmatch");
        exit();
    }

    if($uidExists!==false){  
        header("Location:../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $userName, $pwd);
}else{
    header('Location:../login.php');
    exit();
}
?>