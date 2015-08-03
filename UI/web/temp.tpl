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
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/try.js"></script>
    <script src="js/registration.js"></script>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
        <div class="container"> 
         <div class="row">
          <div class="col-lg-12 col-lg-push-4 col-xs-12 heading">
           <h1 class="admin_heading" style="color:white; font-size: 50px; font-weight: 800;">Registration Page</h1>
          </div>
         </div>
            <br>
            <form action="store.php" method="post">
            <div class="row" style="margin-top: 88px;">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;color:white;font-weight: bold;">      Name           </pre>
             </div>
            <div class="col-lg-6 col-lg-push-2">    
            <input type="text" name="name" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;color:white;font-weight: bold;"> User Name</pre>
             </div>
            <div class="col-lg-6 col-lg-push-2">    
            <input type="text" name="username" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;color:white;font-weight: bold;">  Password</pre>
             </div>
            <div class="col-lg-6 col-lg-push-2">    
            <input type="password" name="password" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;color:white;font-weight: bold;">   Address</pre>
             </div>
            <div class="col-lg-6 col-lg-push-2">    
                <textarea name="address" required="required" placeholder="" class="form-control" style="max-height:100px;min-height:100px; resize: none"></textarea>
            </div>
            </div>
            <br>
                
                <div class="row">
             <div class="col-lg-3 col-lg-push-2">
             <pre style="font-size:22px;color:white;font-weight: bold;">          Locality</pre>
             </div>
            <div class="col-lg-6 col-lg-offset-2">
					
					<select name = "local" class="form-control">
                        <option  value="annanagar">Choose a Location</option>
                        <option value="annanagar">Anna Nagar</option>
                        <option value="kknagar">KK Nagar</option>
                        <option  value="tmb">Tambaram</option>
                        <option  value="gdy">Guindy</option>
                        <option value="tngr">Tnagar</option>
                        </select>
				</div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-2">
             <pre style="font-size:22px;color:white;font-weight: bold;">      Phone Number</pre>
             </div>
            <div class="col-lg-6 col-lg-push-2">    
            <input type="text" name="phone" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;color:white;font-weight: bold;">  Email-id</pre>
             </div>
            <div class="col-lg-6 col-lg-push-2">    
            <input type="text" name="email" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-2">
             <pre style="font-size:22px;color:white;font-weight: bold;">    Account Status</pre>
             </div>
                
                <div class="col-lg-6 col-lg-push-2">
					
					<select name ="type1" class="form-control">
                        <option  value="cook">Cook</option>
                        <option value="foodie">Foodie</option>
                        <option  value="charity">Charity</option>
                        <option  value="eventorg">Event Organisers</option>
                
                        </select>
				</div>
                
                
                
            <!--<div class="col-lg-6 col-lg-push-2" style="color: black;font-weight: bold;">    
            <input type="radio" name="type" value="cook">Cook<br>
            <input type="radio" name="type" value="foodie">Foodie<br>
            <input type="radio" name="type" value="charity">Charity and Orphanage<br>
            <input type="radio" name="type" value="eventorg">Event Organisers    
            </div>-->
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
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
