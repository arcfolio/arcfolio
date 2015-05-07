
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">

    <link rel="icon" href="http://www.thestarkmarket.com/favicon.ico">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://www.thestarkmarket.com/thetatau/res/CSS/main.css" />
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ruda:400,900,700' rel='stylesheet' type='text/css'>
    

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.js"></script> 
  	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.3/angular-sanitize.js"></script>
    <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.0.js"></script>
    <script type="text/javascript" src="ngprogress.js"></script>
    <script type="text/javascript" src="ng-flow-standalone.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-route.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.8/angular-cookies.js"></script>
    
    <script type="text/javascript">
	$(window).load(function() {
		var jumboHeight = $('.jumbotron').outerHeight();
		console.log("console works");
		console.log(jumboHeight);
		function parallax(){
			var scrolled = $(window).scrollTop();
			$('.bg').css('height', (jumboHeight-scrolled) + 'px');
		}
		
		$(window).scroll(function(e){
			parallax();
		});
	});
		
	</script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background-color: #007598;  background-image:url(res/images/background.fw.png); background-size:cover;background-repeat: no-repeat;">
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand visible-xs-block visible-sm-block" href="#">ArcFolio</a>
          <div class="navbar-brand  visible-md-block visible-lg-block">
          	<div class="row">
            	<div class="col-xs-2">
          		</div>
            	<div class="col-xs-2">
                <a href="http://www.facebook.com">
          <img src="res/images/fa.fw.png" style="width :25px;"/>
          		</a>
          		</div>
            	<div class="col-xs-2">
                <a href="http://www.twitter.com">
          <img src="res/images/twitter.fw.png" style="width :25px;"/>
          		</a>
          		</div>
            	<div class="col-xs-2">
                
                <a href="http://www.instagram.com">
          <img src="res/images/inst.fw.png" style="width :25px;"/>
          		</a>
          		</div>
            	<div class="col-xs-2">
                
                <a href="http://www.reddit.com/r/thetatau">
          <img src="res/images/reddit.fw.png" style="width :25px;"/>
          		</a>
          		</div>
          	</div>
          </div>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
          	<li class="visible-xs-block visible-sm-block">
            <div class="row">
                <div class="col-xs-2"></div>
            	<div class="col-xs-2" style="text-align:center;">
                <a href="http://www.facebook.com">
          <img src="res/images/fa.fw.png" style="width :30px; padding-bottom:8px;"/>
          		</a>
          		</div>
            	<div class="col-xs-2" style="text-align:center;">
                <a href="http://www.twitter.com">
          <img src="res/images/twitter.fw.png" style="width :30px;"/>
          		</a>
          		</div>
            	<div class="col-xs-2" style="text-align:center;">
                
                <a href="http://www.instagram.com">
          <img src="res/images/inst.fw.png" style="width :30px;"/>
          		</a>
          		</div>
            	<div class="col-xs-2" style="text-align:center;">
                
                <a href="http://www.reddit.com/r/thetatau">
          <img src="res/images/reddit.fw.png" style="width :30px;"/>
          		</a>
          		</div>
                
                <div class="col-xs-2"></div>
          	</div>
            </li>
            
            
            
            <li class="active"><a href="#">Login</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

	<!--div class="bg"  style="border-bottom:2px solid #333333;"></div>
    <div class="jumbotron visible-md-block visible-lg-block" style="border-bottom:2px solid #333333; margin-bottom:10px;">
      <div style="background: rgba(255, 255, 255, 0.6) none repeat scroll 0% 0%; margin-top: 18px; border-radius: 7px;" class="container">
        <h1 style="color: darkred; text-align: center;">Theta Tau <small style="color: #9A8A00;">Kappa Beta Chapter</small></h1>
        <p style="color: rgb(51, 51, 51);">This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
      </div>
    </div--->
    
        	<div class="container" style="margin-top: 100px;">
            	<div class="row">
                	<div style="background-color: rgba(255, 255, 255, 0.48); border-radius: 7px; text-align:center;"  class="col-xs-12"><h1 style=" font-family: 'Oswald', sans-serif;">Arc<span style="color:#1A0073">Folio</span>
                    <small style="margin-top: 0px; margin-bottom: 20px; ">Build your profolio and find an intership</small></h1></div>
                </div>
            	<div class="row" style="margin-top:20px;">
                        <div style="background-color: rgba(255, 255, 255, 0.48); border-radius: 7px; text-align:center; padding-bottom:15px;" class="col-md-4">
                                <div class="row">
                                    <div class="col-xs-12">
                                       <h3 style="font-family: &quot;ruda&quot;,sans-serif; color: rgb(26, 0, 115); margin-top: 15px; font-weight: 700;">Login.<small style="font-family: &quot;ruda&quot;,sans-serif; margin-left: 19px; color: rgb(153, 153, 153); font-weight: 700;">Create an Account</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <form class="form-signin">
                                            <div style="margin: 10px 0px; text-align: left; text-indent: 9px;">
                                                <label style="text-align: left;" for="inputEmail">Email address</label>
                                                <input style="text-align:center; border: 2px solid rgb(26, 0, 115); border-radius: 4px;" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" type="email">
                                            </div>                                    
                                            <div style="margin: 10px 0px; text-align: left; text-indent: 9px;">
                                                <label for="inputPassword">Password</label>
                                                <input style="text-align:center; border: 2px solid rgb(26, 0, 115);border-radius: 4px;" id="inputPassword" class="form-control" placeholder="Password" required="" type="password">
                                             </div>
                                            <div class="checkbox">
                                              <label style="font-weight:bold;">
                                                <input value="remember-me" type="checkbox"> Remember me
                                              </label>
                                            </div>
                                            <button style="background-color:rgb(26, 0, 115);" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                          </form>
                                    </div>
                                </div>
                            </div>
                </div>
      <footer>
        <p>&copy; Company 2014</p>
      </footer>
            </div>

    <!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
