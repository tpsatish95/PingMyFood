<?php /* Smarty version 3.1.27, created on 2015-08-02 10:48:02
         compiled from "C:\xampp\htdocs\32hourstartup\web\templates\foodiepage.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:292955bdd942a69109_31109067%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7000910da321f43f5a9bf7002b777edf6a235afa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\32hourstartup\\web\\templates\\foodiepage.tpl',
      1 => 1438505273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '292955bdd942a69109_31109067',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55bdd942a9fae7_09534848',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55bdd942a9fae7_09534848')) {
function content_55bdd942a9fae7_09534848 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '292955bdd942a69109_31109067';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>MINIMAL - Free Bootstrap 3 Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">

    <?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="assets/js/modernizr.custom.js"><?php echo '</script'; ?>
>
	

	
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="assets/js/html5shiv.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="assets/js/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#theMenu">
		



	
	<!-- ========== HEADER SECTION ========== -->
	<section id="home" name="home"></section>
	<div id="headerwrap">
		<div class="container">
			
			<br>
			<div class="row">
				<h1>Locality</h1>
				<br>
				<div class="col-lg-6 col-lg-offset-3">
					
					<p><select class="form-control" id="locality">
                        <option value="annanagar">anna nagar</option>
                        <option value="kknagar">kk nagar</option>
                        <option value="tmb">tambaram</option>
                        <option value="gdy">guindy</option>
                        <option value="tngr">tnagar</option>
                        </select></p>
				</div>
				<br>
				<br>
				<div class="col-lg-6 col-lg-offset-3">
				</div>
			</div>
		</div><!-- /container -->
	</div><!-- /headerwrap -->
	
	


	
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<?php echo '<script'; ?>
 src="js/classie.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/smoothscroll.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        $("#locality").change(function(){
            window.location.href="foodiepageredirect.php?locale="+document.getElementById("locality").value;
        });
    <?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>