<?php
session_start();

require('./smartyheader.php');

//Invalid login
if(isset($_SESSION["signInError"]))
    $smarty->assign('error',"Invalid Login details");
else
    $smarty->assign('error',"");

//after logging out the error shouldn't be displayed
unset($_SESSION["signInError"]);



//this section gets executed when the cancel button of the registration form is clicked. if role is set then it must be an admin and therefore direct to admin.php 
if(!isset($_SESSION["role"]))
    $smarty->display('index.tpl');
else
    echo "error page coming soon (:";
    
?>