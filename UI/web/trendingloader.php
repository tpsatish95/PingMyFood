<?php
session_start();
include_once './PhpClientSocket.php';
$trend=getTrending($_SESSION["locality"]);
$_SESSION["trend"] = $trend;
foreach($trend as $key => $value){
    echo $key."^".$value."#";
}
?>