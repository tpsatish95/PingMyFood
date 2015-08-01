<?php /* Smarty version 3.1.27, created on 2015-08-01 08:33:10
         compiled from "C:\xampp\htdocs\32hourstartup\web\templates\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:601855bc6826519b07_36449119%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd68633e2e66db838d14dada5b9f8cad7a0d4800d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\32hourstartup\\web\\templates\\index.tpl',
      1 => 1438410780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '601855bc6826519b07_36449119',
  'variables' => 
  array (
    'rows' => 0,
    'asdf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55bc6826573ba8_05706063',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55bc6826573ba8_05706063')) {
function content_55bc6826573ba8_05706063 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '601855bc6826519b07_36449119';
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/photo.jpg">


    <title>PingMyFood</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
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
          <div class="col-lg-12 col-lg-push-3">
          <h1 id="tra_head" style="color:rgb(0, 0, 0);font-weight: bold;font-size:100px;">Ping my Food !</h1>
          </div>
          <div class="col-lg-12 col-lg-push-7">
          <h1 id="tra_head" style="color:rgb(0, 0, 0);font-weight: bold;font-size:20px;">-The Food Network</h1>
          </div>
        </div>
      <div class="row" style="margin-top:141px">
          
          <div class="col-md-12">
      <form class="form-signin" action="authenticate.php" method="post">
        
        <input type="text" id="username" name="username" class="form-control" value="" placeholder="Username" required autofocus>
        
        <input type="password" id="inputPassword" name="password" class="form-control" value="" placeholder="Password" required>
          
          <div class="checkbox">
          <label style="color:whitesmoke;">
            <input type="checkbox" name="remember"> Remember me
          </label>
        </div>
        <div class="row">
        <div class="col-md-6">
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: #1abc9c; border-color:#9099A2;">Sign in</button>
        </div>                    
            <div class="col-md-6">
              <a href="registration.php" class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: #1abc9c; border-color:#9099A2;">Sign up</a>
        </div>
          </div>
      </form>
        </div>
      </div>

    </div> <!-- /container -->
    <?php echo '<script'; ?>
>
     $(window).load(function() {
     $("#tra_head").effect("slide",1200);
          });  
    <?php echo '</script'; ?>
>

    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <?php echo '<script'; ?>
 src="js/ie10-viewport-bug-workaround.js"><?php echo '</script'; ?>
>
    <div style="color : blue;">
      <?php
$_from = $_smarty_tpl->tpl_vars['rows']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['asdf'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['asdf']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['asdf']->value) {
$_smarty_tpl->tpl_vars['asdf']->_loop = true;
$foreach_asdf_Sav = $_smarty_tpl->tpl_vars['asdf'];
?>
    <h1><?php echo $_smarty_tpl->tpl_vars['asdf']->value['first_name'];?>
</h1>
    <!--<?php echo $_smarty_tpl->tpl_vars['asdf']->value['id'];?>

    <?php
$_smarty_tpl->tpl_vars['asdf'] = $foreach_asdf_Sav;
}
?>
  </div>  -->
  </body>
</html>
<?php }
}
?>