<?php
session_start();

require('smartyheader.php');
require('database.php');
$locale = $_GET['locale'];
$result = $mysqli->query("select * from users where locality='$locale'");
while($row1 = $result->fetch_array()){
    $id = $row1["userid"];
    $cook_rating=$row1["rating"];
    $user = $row1["username"];
    $localcooks = $mysqli->query("select * from cooktable where userid=$id");
    while($row = $localcooks->fetch_array())
    {
        $dish = $row['dish'];
        $result1 = $mysqli->query("select rating from reviews where username='$user' and dish='$dish'");
        $reviewrow = $result1->fetch_assoc();
        $rating_food = $reviewrow["rating"];
        echo $row["dish"] ."^". $row["qty"] ."^". $row["cost"] ."^". $row["aboutfood"]. "^" . $id."^".$user. "^".$cook_rating."^".$rating_food."#";
    }
    echo "&&&";
}
?>