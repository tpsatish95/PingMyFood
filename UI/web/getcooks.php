<?php
session_start();

require('smartyheader.php');
require('database.php');
$locale = $_GET['locale'];
$result = $mysqli->query("select userid from users where locality='$locale'");
while($row1 = $result->fetch_array()){
    $id = $row1["userid"];
    $localcooks = $mysqli->query("select * from cooktable where userid=$id");
    while($row = $localcooks->fetch_array())
    {
    echo $row["dish"] ."^". $row["qty"] ."^". $row["cost"] ."^". $row["aboutfood"]. "#";
    }
    echo "&&&";
}
?>