<?php
session_start();
require('database.php');
require('./smartyheader.php');
$user = $_SESSION["username"];
/*$details = $mysqli->query("select * from users where username='$user'");
$row=$details->fetch_assoc();
$smarty->assign('username',$_SESSION["username"]);        
$smarty->assign('locality',$row["locality"]);
$smarty->assign('address',$row["address"]);
$smarty->assign('phno',$row["phno"]);
$smarty->assign('email',$row["emailid"]);
$smarty->assign('role',$row["type"]);
$smarty->assign('img',$row["img"]);*/

$smarty->display('foodiepage.tpl');
?>