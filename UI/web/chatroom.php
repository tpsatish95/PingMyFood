<?php
session_start();

require('smartyheader.php');
require('database.php');

$user = $_SESSION["username"];

$comment = $_GET['comment'];

$loc = $_SESSION["locality"];	
// Escape User Input to help prevent SQL Injection
$comment = mysql_real_escape_string($comment);
$user = mysql_real_escape_string($user);
$loc = mysql_real_escape_string($loc);

	
//build query
$insert = "INSERT INTO comments (user,comment,locality)
values ('$user','$comment','$loc')";

if (mysqli_query($mysqli, $insert)) {
    $result = $mysqli->query("select * from comments where locality='$loc'");
while($row = $result->fetch_array())
{
echo $row["user"] ."^". $row["comment"] ."^". $row["locality"] . "#";

}
} else {
    echo "failed";
    
}





?>