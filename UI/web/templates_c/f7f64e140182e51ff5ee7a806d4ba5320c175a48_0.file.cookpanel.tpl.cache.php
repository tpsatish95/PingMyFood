<?php /* Smarty version 3.1.27, created on 2015-08-02 09:38:40
         compiled from "C:\xampp\htdocs\32hourstartup\web\templates\cookpanel.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:129355bdc900aa78e5_06001824%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7f64e140182e51ff5ee7a806d4ba5320c175a48' => 
    array (
      0 => 'C:\\xampp\\htdocs\\32hourstartup\\web\\templates\\cookpanel.tpl',
      1 => 1438500143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129355bdc900aa78e5_06001824',
  'variables' => 
  array (
    'img' => 0,
    'username' => 0,
    'locality' => 0,
    'address' => 0,
    'role' => 0,
    'email' => 0,
    'phno' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55bdc900b34a84_69690001',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55bdc900b34a84_69690001')) {
function content_55bdc900b34a84_69690001 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '129355bdc900aa78e5_06001824';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>CookPanel</title>

    <!-- Bootstrap CSS -->    
    <link href="css/panel/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/panel/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/panel/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/panel/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/panel/style.css" rel="stylesheet">
    <link href="css/panel/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="js/html5shiv.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="js/respond.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="js/lte-ie7.js"><?php echo '</script'; ?>
>
    <![endif]-->
      
      
      
      <?php echo '<script'; ?>
 type = "text/javascript">
          
            function ajaxfunction(){
                var obj = new XMLHttpRequest();
                obj.onreadystatechange = function(){
                    if(obj.readyState == 4){
                        var rows = obj.responseText.split("#");
                        $("#ret_table").empty();
                        $("#ret_table").append("<tr><th>Dish Name</th><th>Quantity</th><th>Cost</th><th>Description</th></tr>");
                        for(var i=0;i<rows.length-1;i++)
                        {
                            var columns = rows[i].split("^");
                            var row = "<tr><td>"+columns[0]+"</td><td>"+columns[1]+"</td><td>"+columns[2]+"</td><td>"+columns[3]+"</td></tr>";
                            $("#ret_table").append(row);
                        }                      
                    }
                }
                var desc = document.getElementById("desc").value;
                var dish = document.getElementById("dish").value;
                var qty = document.getElementById("qty").value;
                var cost = document.getElementById("cost").value;
                var queryString = "dish="+dish+"&qty="+qty+"&cost="+cost+"&desc="+desc;
                
                
                obj.open("GET","ajax_cook.php?"+queryString,true);
                obj.send();
            }
      <?php echo '</script'; ?>
>
    
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">Cook <span class="lite">Panel</span></a>
            <!--logo end-->

            

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                   
                   
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                  
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src=<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
 style="height: 50px;">
                            </span>
                            <span class="username"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="index.html">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  
               
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						
					</ol>
				</div>
			</div>
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                              <h4><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</h4>               
                              <div class="follow-ava">
                                  <img src=<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
 alt="" style="height:75px;">
                              </div>
                              
                            </div>
                            <div class="col-lg-4 col-sm-4 follow-info">
                                <h6>
                                    <span><i class="icon_pin_alt"></i><?php echo $_smarty_tpl->tpl_vars['locality']->value;?>
</span>
                                </h6>
                            </div>
                          </div>
                    </div>
                </div>
              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#recent-activity">
                                          <i class="icon-home"></i>
                                          Daily Activity
                                      </a>
                                  </li>
                                  <li>
                                      <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="recent-activity" class="tab-pane active">
                                      <h2>About today's menu</h2>
                                       <textarea name="menu" id="desc" required="required" placeholder="" class="form-control" style="max-height:100px;min-height:100px; resize: none"></textarea>
                                      <table id="table" style="width:100%;margin-top: 30px;">
  <tr>
    <th>Dish Name</th>
    <th>Quantity</th>		
    <th>Cost</th>
  </tr>
  <tr>
    <td><input type="text" name="dish" id="dish"/> </td>
    <td><input type="text" name="qty" id="qty"/> </td>	
    <td><input type="text" name="cost" id="cost"/> </td>
  </tr>
 
</table>
    
<button type="button" id="addbutton" onclick="ajaxfunction()" class="btn btn-default btn-lg" style="margin-top: 30px;">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add dish
</button>
                                    

                                      
                                      <table class="table" id="ret_table" style="margin-top: 41px;">
                                           
                                     </table>
                                  </div>
                                  <!-- profile -->
                                  <div id="profile" class="tab-pane">
                                    <section class="panel">
                                    
                                      <div class="panel-body bio-graph-info">
                                          <h1>Bio Graph</h1>
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span>First Name </span>: <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
 </p>
                                              </div>                                              
                                              
                                              <div class="bio-row">
                                                  <p><span>Address </span>: <?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Role </span>: <?php echo $_smarty_tpl->tpl_vars['role']->value;?>
</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Email </span>:<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</p>
                                              </div>
                                             
                                              <div class="bio-row">
                                                  <p><span>Phone </span>: <?php echo $_smarty_tpl->tpl_vars['phno']->value;?>
</p>
                                              </div>
                                          </div>
                                      </div>
                                    </section>
                                      <section>
                                          <div class="row">                                              
                                          </div>
                                      </section>
                                  </div>
                                  <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane">
                                    <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1>
                                              <form class="form-horizontal" role="form">                                                  
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">First Name</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="f-name" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Last Name</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="l-name" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">About Me</label>
                                                      <div class="col-lg-10">
                                                          <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Country</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="c-name" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Birthday</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="b-day" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Occupation</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="occupation" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Email</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="email" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Mobile</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="mobile" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Website URL</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="url" placeholder="http://www.demowebsite.com ">
                                                      </div>
                                                  </div>

                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" class="btn btn-primary">Save</button>
                                                          <button type="button" class="btn btn-danger">Cancel</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </section>
                                  </div>
                              </div>
                          </div>
                      </section>
                 </div>
              </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <?php echo '<script'; ?>
 src="js/panel/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/panel/bootstrap.min.js"><?php echo '</script'; ?>
>
    <!-- nice scroll -->
    <?php echo '<script'; ?>
 src="js/panel/jquery.scrollTo.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/panel/jquery.nicescroll.js" type="text/javascript"><?php echo '</script'; ?>
>
    <!-- jquery knob -->
    <?php echo '<script'; ?>
 src="js/panel/jquery.knob.js"><?php echo '</script'; ?>
>
    <!--custome script for all page-->
    <?php echo '<script'; ?>
 src="js/panel/scripts.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
var obj = new XMLHttpRequest();
                obj.onreadystatechange = function(){
                    if(obj.readyState == 4){
                        
                        var rows = obj.responseText.split("#");
                        $("#ret_table").empty();
                        $("#ret_table").append("<tr><th>Dish Name</th><th>Quantity</th><th>Cost</th><th>Description</th></tr>");
                        for(var i=0;i<rows.length-1;i++)
                        {
                            var columns = rows[i].split("^");
                            var row = "<tr><td>"+columns[0]+"</td><td>"+columns[1]+"</td><td>"+columns[2]+"</td><td>"+columns[3]+"</td></tr>";
                            $("#ret_table").append(row);
                        }                      
                    }
                }
                 obj.open("GET","loadcooktable.php",true);
                obj.send();      
      
<?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>

      //knob
      $(".knob").knob();

  <?php echo '</script'; ?>
>
      
      <?php echo '<script'; ?>
>
      window
      <?php echo '</script'; ?>
>

      


  </body>
</html>
<?php }
}
?>