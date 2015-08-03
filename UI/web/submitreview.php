<?php
session_start();
include_once './PhpClientSocketSenti.php';
require('smartyHeader.php');
require('database.php');



$username = $_POST["username"];
$dish = $_POST["dish"];
$review = $_POST["review"];


$insert = "insert into reviews(username,dish,review)
values ('$username','$dish','$review')";

if (mysqli_query($mysqli, $insert)) {
    echo "Succesfully submitted";
       $rating_cook = getSentimentByCook($username);
       $rating_food = getSentimentByFood($username,$dish);
       $cook_update = "update users set rating=".$rating_cook." where username='".$username."'";
       $review_update = "update reviews set rating=".$rating_food." where username='".$username."' and dish='".$dish."'";
    mysqli_query($mysqli, $cook_update);
    mysqli_query($mysqli, $review_update);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Please enter a valid username<br>";
    
    
    
}

?>