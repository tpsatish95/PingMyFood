<?php
/*%%SmartyHeaderCode:20555be93fb061e06_67611814%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da54b2893c0ad416770a90ff7248237207340669' => 
    array (
      0 => 'C:\\xampp\\htdocs\\32hourstartup\\web\\templates\\foodiepagefull.tpl',
      1 => 1438553079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20555be93fb061e06_67611814',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.27',
  'unifunc' => 'content_55c03a4f8fc8e3_61835640',
  'has_nocache_code' => false,
  'cache_lifetime' => 5,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55c03a4f8fc8e3_61835640')) {
function content_55c03a4f8fc8e3_61835640 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Moderna - Bootstrap 3 flat corporate template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->
<link href="css/foodiepage/bootstrap.min.css" rel="stylesheet" />
<link href="css/foodiepage/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/foodiepage/jcarousel.css" rel="stylesheet" />
<link href="css/foodiepage/flexslider.css" rel="stylesheet" />
<link href="css/foodiepage/style.css" rel="stylesheet" />
<link href="css/foodiepage/chat.css" rel="stylesheet" />

<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
 <script type = "text/javascript">
          
            function ajaxfunction(){
                var obj = new XMLHttpRequest();
                obj.onreadystatechange = function(){
                    if(obj.readyState == 4){
                        var rows = obj.responseText.split("#");
                        $("#ret_table").empty();
                        //$("#ret_table").append("<tr><th>Dish Name</th><th>Quantity</th><th>Cost</th><th>Description</th></tr>");
                        for(var i=0;i<rows.length-1;i++)
                        {
                            var columns = rows[i].split("^");
                            var row = "<div class='chat-box-name-left' style='font-size:15px;font-weight:bold;'>"+columns[0]+" :</div><div class='chat-box-right'>"+columns[1]+"</div><hr class='hr-clas' />";
                            $("#ret_table").append(row);
                        }                      
                    }
                }
                var comment = document.getElementById("comment").value;
                var queryString = "comment="+comment;
                
                
                obj.open("GET","chatroom.php?"+queryString,true);
                obj.send();
            }
            function ajaxchathistory(){
                var obj = new XMLHttpRequest();
                obj.onreadystatechange = function(){
                    if(obj.readyState == 4){
                        var rows = obj.responseText.split("#");
                        $("#ret_table").empty();
                        //$("#ret_table").append("<tr><th>Dish Name</th><th>Quantity</th><th>Cost</th><th>Description</th></tr>");
                        for(var i=0;i<rows.length-1;i++)
                        {
                            var columns = rows[i].split("^");
                            var row = "<div class='chat-box-name-left' style='font-size:15px;font-weight:bold;'>"+columns[0]+" :</div><div class='chat-box-right'>"+columns[1]+"</div><hr class='hr-clas' />";
                        
                            $("#ret_table").append(row);
                        }                      
                    }
                }
                obj.open("GET","chatroomautoload.php",true);
                obj.send();
            }
            var interval = setInterval(ajaxchathistory,1000);
            function trendingajax(){
                var obj = new XMLHttpRequest();
                obj.onreadystatechange = function(){
                    if(obj.readyState == 4){
                        var rows = obj.responseText.split("#");
                        $("#trend").empty();
                        //$("#ret_table").append("<tr><th>Dish Name</th><th>Quantity</th><th>Cost</th><th>Description</th></tr>");
                        for(var i=0;i<rows.length-1;i++)
                        {
                            var columns = rows[i].split("^");
                            if (columns[0] == "general" || columns[0] == "")
                                continue
                            var row = "<button class='btn btn-primary' type='button' style='background-color:#16a085;'>"+columns[0]+" <span class='badge' style='border-radius=50px;'> "+columns[1]+"</span></button><br/><br/>";
                            $("#trend").append(row);
                        }                      
                    }
                }
                obj.open("GET","trendingloader.php",true);
                obj.send();
            }
            setInterval(trendingajax,1000);
      </script>
    
    
</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Hey <span>Foodie!</span></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        
                        <li><a href="#chat_trend">Chat and trend</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	
	<!-- start slider -->
<div class="container" style="width:100%;padding:0px;">
    <div id="home">
   <section id="content" >
	<div class="container" style="padding:0px;">
		<div class="row" style="margin-top:150px;">
			<div class="col-lg-12">
				<div class="row" id="cooksDetails">
				</div>
			</div>
		</div>
		
	
	
       </div>
	</section>
        </div>
    <a name="chat_trend"></a>   
	<section class="callaction">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="big-cta">
					<div class="cta-text">
						<h2><span>Chat</span> and <span>Trending</span> food items</h2>
					</div>
				</div>
			</div>
             <div class="row">
        <div class="col-md-6" style="margin-top: 60px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    
                </div>
                <div class="panel-body">
                    <ul class="chat" id="ret_table" style="color: black;">
                      
                    
                        
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="comment" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat" onclick="ajaxfunction()">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
                 
                 
                <div class="col-md-6" style="margin-top: 60px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Trending
                    
                </div>
                <div class="panel-body">
                    <ul class="chat" id="trend" style="color: black;">
                    </ul>
                </div>
                
            </div>
        </div> 
    </div>
		</div>
	</div>
	</section>
	
	
	<div class="container" style="margin-top:50px">
        <a name="contact"></a>
		<div class="row">
			<div class="col-lg-12 col-lg-push-5">
				
                <h1 class="widgetheading"><span style="color:#68A4C4;">Contact</span> us</h1></div>
			<div class="col-lg-6" style="margin-top: 50px;">	
            <div class="widget">	
                <address style="color:black">
					<strong>OutofTheblue Inc</strong><br>
					 SSN CE<br>
					 Earth </address>
					<p style="color:black";>
						<i class="icon-phone"></i> +91 9488515784<br>
						<i class="icon-envelope-alt"></i> admin@outoftheblue.com
					</p>
				</div>
            </div>
			</div>
			
			
		</div>
	</div>
       <footer>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>Made with &lt3 by OutofTheblue Inc&copy;  2015 All right reserved. By </span><a href="#">OutofTheblue Inc</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="js/foodiepage/jquery.js"></script>
<script src="js/foodiepage/jquery.easing.1.3.js"></script>
<script src="js/foodiepage/bootstrap.min.js"></script>
<script src="js/foodiepage/jquery.fancybox.pack.js"></script>
<script src="js/foodiepage/jquery.fancybox-media.js"></script>
<script src="js/foodiepage/google-code-prettify/prettify.js"></script>
<script src="js/foodiepage/portfolio/jquery.quicksand.js"></script>
<script src="js/foodiepage/portfolio/setting.js"></script>
<script src="js/foodiepage/jquery.flexslider.js"></script>
<script src="js/foodiepage/animate.js"></script>
<script src="js/foodiepage/custom.js"></script>
<script type="text/javascript">
var obj = new XMLHttpRequest();
obj.onreadystatechange = function(){
    if(obj.readyState == 4){
        var cooks = obj.responseText.split("&&&");
        $("#cooksDetails").empty();
        for(var i=0;i<cooks.length-1;i++)
        {
            var rows = cooks[i].split("#");
            for(var j=0;j<rows.length-1;j++){
                var columns = rows[j].split("^");
                var c = parseInt(columns[6]);
                var cc = parseInt(columns[7]);
                var star1 = '<div class="rating">';
                for(var ci =0 ; ci < c ; ci++)
                star1 += '<span>☆</span>';
                star1 += '</div>';
                
 var star2 = '<div class="rating">';
                for(var ci =0 ; ci < cc ; ci++)
                star2 += '<span>☆</span>';
                star2 += '</div>';
                
                $("#cooksDetails").append('<div class="col-lg-3 col-md-6" style="margin-top:15px;"><div class="box"><div class="box-gray aligncenter"><h4>'+columns[0]+'</h4><p>'+star1+'</p><div class="icon"><i class="glyphicon glyphicon-cutlery fa-4x"></i></div><p>'+columns[5]+star2+'</p></div><div class="box-bottom"><input type="button" class="trans_button" id="button'+j.toString()+'" value="Write a review" onclick="review(\''+columns[5]+'\',\''+columns[0]+'\')"></input></div></div></div>');
            }
            
            /*var row = "<tr><td>"+columns[0]+"</td><td>"+columns[1]+"</td><td>"+columns[2]+"</td><td>"+columns[3]+"</td></tr>";
            $("#cooksDetails").append(row);*/
        }                    

    }
}

obj.open("GET","getcooks.php?locale="+'tmb',true);
obj.send();
</script>
        <script type="text/javascript">
             function review(user,food){
                $(".container").css('opacity','0.3');
                var f = document.createElement("form");
                f.setAttribute('role','form');
                f.setAttribute('method',"post");
                f.setAttribute('action',"submitreview.php");
                f.setAttribute('class','reviewclass'); 
                var div = document.createElement("div");
                div.setAttribute("class","form-group");
                 
                var name = document.createElement("input"); //input element, text
                name.setAttribute('type',"text");
                name.setAttribute('disabled','true');
                name.setAttribute('value',user);
                name.setAttribute('name',"dummyname");
                name.setAttribute('class','form-control');
                
                var name1 = document.createElement("input"); //input element, text
                name1.setAttribute('type',"hidden");
                name1.setAttribute('value',user);
                name1.setAttribute('name',"username");
                
                var div1 = document.createElement("div");
                div1.setAttribute("class","form-group");
                 
                var dish = document.createElement("input"); //input element, text
                dish.setAttribute('type',"text");
                dish.setAttribute('disabled','true');
                dish.setAttribute('value',food);
                dish.setAttribute('name',"dummydish");
                dish.setAttribute('class','form-control');
                
                var dish1 = document.createElement("input"); //input element, text
                dish1.setAttribute('type',"hidden");
                dish1.setAttribute('value',food);
                dish1.setAttribute('name',"dish");
                
                var div2 = document.createElement("div");
                div2.setAttribute("class","form-group");
                 
                var review = document.createElement("textarea"); //input element, text
                review.setAttribute('placeholder',"write a review");
                review.setAttribute('name',"review");
                review.setAttribute('class','form-control');
                
                var div3 = document.createElement("div");
                div3.setAttribute("class","form-group");
                var submit = document.createElement("input"); //input element, Submit button
                submit.setAttribute('type',"submit");
                submit.setAttribute('value',"Submit");
                submit.setAttribute('class','btn btn-primary');
                
                f.appendChild(div);
                f.appendChild(div1);
                f.appendChild(div2);
                f.appendChild(div3);
                div.appendChild(name);
                div1.appendChild(dish);
                f.appendChild(name1);
                f.appendChild(dish1);
                div2.appendChild(review);
                div3.appendChild(submit);
                 
                document.getElementsByTagName('body')[0].appendChild(f);

             }
        </script>
</body>
</html><?php }
}
?>