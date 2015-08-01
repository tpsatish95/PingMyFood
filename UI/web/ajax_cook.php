<?php
session_start();

require('smartyheader.php');
require('database.php');

$user = $_SESSION["username"];
$details = $mysqli->query("select userid from users where username='$user'");
$row=$details->fetch_assoc();

$id = $row["userid"];
$dish = $_GET['dish'];
$qty = $_GET['qty'];
$cost = $_GET['cost'];
$desc = $_GET['desc'];
	
// Escape User Input to help prevent SQL Injection
$dish = mysql_real_escape_string($dish);
$qty = mysql_real_escape_string($qty);
$cost = mysql_real_escape_string($cost);
$desc = mysql_real_escape_string($desc);
	
//build query
$insert = "INSERT INTO cooktable (dish,qty,cost,aboutfood,userid)
values ('$dish','$qty','$cost','$desc','$id')";

if (mysqli_query($mysqli, $insert)) {
    $result = $mysqli->query("select * from cooktable where userid=$id");
while($row = $result->fetch_array())
{
echo $row["dish"] ."^". $row["qty"] ."^". $row["cost"] ."^". $row["aboutfood"]. "#";

}
} else {
    echo "failed";
    
}





?>