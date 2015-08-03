<?php
/*%%SmartyHeaderCode:129955be848a6b66b8_20630042%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd68633e2e66db838d14dada5b9f8cad7a0d4800d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\32hourstartup\\web\\templates\\index.tpl',
      1 => 1438545490,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129955be848a6b66b8_20630042',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.27',
  'unifunc' => 'content_55c0395794e844_77698472',
  'has_nocache_code' => false,
  'cache_lifetime' => 5,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55c0395794e844_77698472')) {
function content_55c0395794e844_77698472 ($_smarty_tpl) {
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
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/try.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
        <div class="row">
          <div class="col-lg-12 col-lg-push-3">
          <h1 id="tra_head" style="color:rgb(0, 0, 0);font-weight: bold;font-size:100px;">Ping my Food !</h1>
          </div>
          <div class="col-lg-12 col-lg-push-7">
          <h1 id="tra_head" style="color:rgb(64, 66, 33);font-weight: bold;font-size:32px;">-The Food Network</h1>
          </div>
        </div>
      <div class="row" style="margin-top:100px">
          
          <div class="col-md-12">
      <form class="form-signin" action="authenticate.php" method="post">
        
        <input type="text" id="username" name="username" class="form-control" value="" placeholder="Username" required autofocus>
        
        <input type="password" id="inputPassword" style="margin-top: 10px;" name="password" class="form-control" value="" placeholder="Password" required>
          
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
    <script>
     $(window).load(function() {
     $("#tra_head").effect("slide",1200);
          });  
    </script>

    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <div style="color : blue;">
      <br />
<b>Notice</b>:  Undefined index: rows in <b>C:\xampp\htdocs\32hourstartup\web\templates_c\d68633e2e66db838d14dada5b9f8cad7a0d4800d_0.file.index.tpl.cache.php</b> on line <b>132</b><br />
<br />
<b>Notice</b>:  Trying to get property of non-object in <b>C:\xampp\htdocs\32hourstartup\web\templates_c\d68633e2e66db838d14dada5b9f8cad7a0d4800d_0.file.index.tpl.cache.php</b> on line <b>132</b><br />
  </div>  -->
  </body>
</html>
<?php }
}
?>