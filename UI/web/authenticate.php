<?php



session_start();
require('database.php');
require('./smartyheader.php');
$user = $_POST["username"];
$details = $mysqli->query("select * from users where username='$user'");
$row=$details->fetch_assoc();

$role1=$row["type"];


$_SESSION["id"] = $row["userid"];






if(isset($_SESSION["signInError"])){
    unset($_SESSION["signInError"]);
}

$role = "";
$_SESSION["username"] = $_POST["username"];
$username = $_POST["username"];
$password = $_POST["password"];

$result = $mysqli->query("select * from users"); 
$check = false;

while($row = $result->fetch_array()){
    if($row["username"] == $username){
        if($row["password"] == $password){
            $_SESSION["role"] = $row["type"];
            $check = true;
            break;
            //now $row contains the logged in username
        }//password check if
    }//username check if 
}//while

if($check == true){
    if($role1 == "cook"){
        header("Location: cookpanel.php");
    }
    elseif($role1 == "foodie"){
        header("Location: foodie.php");
    }
}else {
    $_SESSION["signInError"] = true;
    header("Location: index.php");
}
    

    
    
