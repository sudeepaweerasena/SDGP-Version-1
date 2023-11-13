<?php
$serverName = "localhost";
$dbUsername =  "sdw";
$dbPassword = ")66niinTfDqQrYo/";
$dbName = "usersDb";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo 'It\'s workingn';
}
?>
