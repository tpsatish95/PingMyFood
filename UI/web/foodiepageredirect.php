<?php
session_start();
include_once './PhpClientSocket.php';
require('database.php');
require('./smartyheader.php');
$user = $_SESSION["username"];
$details = $mysqli->query("select * from users where username='$user'");
$row=$details->fetch_assoc();
$smarty->assign('username',$_SESSION["username"]);        
$smarty->assign('address',$row["address"]);
$smarty->assign('phno',$row["phno"]);
$smarty->assign('locale',$_GET["locale"]);
$smarty->assign('email',$row["emailid"]);
$smarty->assign('role',$row["type"]);
$smarty->assign('img',$row["img"]);
$_SESSION["locality"] = $_GET["locale"];
$trend=getTrending($_GET["locale"]);
$smarty->assign('trend',$trend);
$_SESSION["trend"] = $trend;
$smarty->display('foodiepagefull.tpl');
?>