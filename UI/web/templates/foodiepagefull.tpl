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
                            var row = "<tr><td>"+columns[0]+"</td><td>"+columns[1]+"</td><td>"+columns[2]+"</td><td>";
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
                            var row = "<tr><td>"+columns[0]+"</td><td>"+columns[1]+"</td><td>"+columns[2]+"</td><td>";
                            $("#ret_table").append(row);
                        }                      
                    }
                }
                obj.open("GET","chatroomautoload.php",true);
                obj.send();
            }
            var interval = setInterval(ajaxchathistory,1000);
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
                        <li class="active"><a href="index.html">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Features <b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="components.html">Components</a></li>
								<li><a href="pricingbox.html">Pricing box</a></li>
                            </ul>
                        </li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="featured">
	<!-- start slider -->
<div class="container">
   <section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row" id="cooksDetails">
				</div>
			</div>
		</div>
		<!-- divider -->
		<div class="row">
			<div class="col-lg-12">
				<div class="solidline">
				</div>
			</div>
		</div>
		<!-- end divider -->
		<!-- Portfolio Projects -->
		<div class="row">
			<div class="col-lg-12">
				<h4 class="heading">Recent Works</h4>
				

	</div>
	</section>
</div>

	

	</section>
	<section class="callaction">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="big-cta">
					<div class="cta-text">
						<h2><span>Moderna</span> HTML Business Template</h2>
					</div>
				</div>
			</div>
             <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-ok-sign">
                            </span>Available</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-remove">
                            </span>Busy</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-time"></span>
                                Away</a></li>
                            <li class="divider"></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-off"></span>
                                Sign Out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="chat" id="ret_table">
                      
                    
                        
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
    </div>
		</div>
	</div>
	</section>
	
	<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Get in touch with us</h5>
					<address>
					<strong>Moderna company Inc</strong><br>
					 Modernbuilding suite V124, AB 01<br>
					 Someplace 16425 Earth </address>
					<p>
						<i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891 <br>
						<i class="icon-envelope-alt"></i> email@domainname.com
					</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Pages</h5>
					<ul class="link-list">
						<li><a href="#">Press release</a></li>
						<li><a href="#">Terms and conditions</a></li>
						<li><a href="#">Privacy policy</a></li>
						<li><a href="#">Career center</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Latest posts</h5>
					<ul class="link-list">
						<li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
						<li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
						<li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Flickr photostream</h5>
					<div class="flickr_badge">
						<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=34178660@N03"></script>
					</div>
					<div class="clear">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; Moderna 2014 All right reserved. By </span><a href="http://bootstraptaste.com" target="_blank">Bootstraptaste</a>
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
                $("#cooksDetails").append('<div class="col-lg-3"><div class="box"><div class="box-gray aligncenter"><h4>'+columns[0]+'</h4><div class="icon"><i class="fa fa-pagelines fa-3x"></i></div><p>I can cook.</p></div><div class="box-bottom"><a href="#">Learn more</a></div></div></div>');
            }
            /*var row = "<tr><td>"+columns[0]+"</td><td>"+columns[1]+"</td><td>"+columns[2]+"</td><td>"+columns[3]+"</td></tr>";
            $("#cooksDetails").append(row);*/
        }                    

    }
}
obj.open("GET","getcooks.php?locale="+'{$locale}',true);
obj.send();
</script>
</body>
</html>