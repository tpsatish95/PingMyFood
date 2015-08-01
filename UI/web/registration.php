
<?php

require('./smartyheader.php');
$smarty = new Smarty;
$smarty->assign('title','Registration');
$smarty->display('registration.tpl');

?>
