<?php
if(isset($_POST["submit"])){   // when user enter sumbit button then he access to login.in.php page
    $userName = $_POST["uName"];  //get uName and store it on userName variable
    $pwd=$_POST["password"];

    //using dbh code block, so we can $conn varable on anywhere on this page
    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if(emptyInputsLogin($userName, $pwd)!==false){  //100% niwaradi userName ekai password hera wena monawa dunnth exit we.
        exit();
    }

    LogininUser($userName, $pwd);

}else{
    header('Location:../login.php');
}
?>