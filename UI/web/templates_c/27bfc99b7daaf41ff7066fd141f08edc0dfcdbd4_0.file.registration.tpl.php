<?php /* Smarty version 3.1.27, created on 2015-08-02 01:33:57
         compiled from "C:\xampp\htdocs\32hourstartup\web\templates\registration.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:196855bd5765142a59_02402057%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27bfc99b7daaf41ff7066fd141f08edc0dfcdbd4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\32hourstartup\\web\\templates\\registration.tpl',
      1 => 1438471872,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196855bd5765142a59_02402057',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55bd576518b271_91502828',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55bd576518b271_91502828')) {
function content_55bd576518b271_91502828 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '196855bd5765142a59_02402057';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../img/photo.jpg">

    <title>Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
      <link href="css/registration.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><?php echo '<script'; ?>
 src="../../assets/js/ie8-responsive-file-warning.js"><?php echo '</script'; ?>
><![endif]-->
    <?php echo '<script'; ?>
 src="js/ie-emulation-modes-warning.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/try.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/registration.js"><?php echo '</script'; ?>
>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
  </head>

  <body>
        <div class="container"> 
         <div class="row">
          <div class="col-lg-12 col-lg-push-4 col-xs-12 heading">
           <h1 class="admin_heading" style="color:rgb(0, 0, 0); font-size: 50px; font-weight: 800;">Registration Page</h1>
          </div>
         </div>
            <br>
            <form action="store.php" method="post">
            <div class="row" style="margin-top: 88px;">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;color:black;font-weight: bold;">      Name           </pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="name" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;color:black;font-weight: bold;"> User Name</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="username" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;color:black;font-weight: bold;">  Password</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="password" name="password" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;color:black;font-weight: bold;">   Address</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
                <textarea name="address" required="required" placeholder="" class="form-control" style="max-height:100px;min-height:100px; resize: none"></textarea>
            </div>
            </div>
            <br>
                
                <div class="row">
             <div class="col-lg-3 col-lg-push-2">
             <pre style="font-size:22px;color:black;font-weight: bold;">      Locality</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="locality" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-2">
             <pre style="font-size:22px;color:black;font-weight: bold;">      Phone Number</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="phone" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;color:black;font-weight: bold;">  Email-id</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="email" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-2">
             <pre style="font-size:22px;color:black;font-weight: bold;">    Account Status</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3" style="color: black;font-weight: bold;">    
            <input type="radio" name="type" value="cook">Cook<br>
            <input type="radio" name="type" value="foodie">Foodie<br>
            <input type="radio" name="type" value="charity">Charity and Orphanage<br>
            <input type="radio" name="type" value="eventorg">Event Organisers    
            </div>
            </div>
               
            <div class="row" style="margin-top: 36px;">
                <div class="col-md-6 col-md-push-5">
                 <button type="submit" class="btn btn-info">SAVE</button>
                </div>
                <div class="col-md-6">
                <a href="index.php"><button type="button" class="btn btn-info">CANCEL</button></a>
                </div>
            </div>
            </form>    
        </div>
 

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?php echo '<script'; ?>
 src="js/ie10-viewport-bug-workaround.js"><?php echo '</script'; ?>
>
  </body>
</html>
<?php }
}
?>