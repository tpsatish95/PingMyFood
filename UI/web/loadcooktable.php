<?php
session_start();

require('smartyheader.php');
require('database.php');
$us=$_SESSION["username"];
$id=$_SESSION["id"];
$result = $mysqli->query("select * from cooktable where userid=$id");
while($row = $result->fetch_array())
{
echo $row["dish"] ."^". $row["qty"] ."^". $row["cost"] ."^". $row["aboutfood"]. "#";

}

?>