<?php
session_start();
session_unset();
require('./smartyheader.php');
$smarty = new Smarty;
$smarty->assign('title','PingMyFood');
 // Includes Login Script
$smarty->display('index.tpl');


?>