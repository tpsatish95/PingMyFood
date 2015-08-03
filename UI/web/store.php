<?php
session_start();

require('smartyHeader.php');
require('database.php');


$name = $_POST["name"];
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$locality = $_POST["locality"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$type = $_POST["type"];


$insert = "insert into users (name,username,password,address,locality,phno,emailid,type)
values ('$name','$username','$password','$address','$locality','$phone','$email','$type')";

if (mysqli_query($mysqli, $insert)) {
   header("Location: index.php");
} else {
    echo "Please enter a valid username<br>";
    
}

?>
