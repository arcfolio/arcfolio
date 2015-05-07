

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
	<link rel="stylesheet" type="text/css" href="http://www.thestarkmarket.com/arcfolio/res/CSS/main.css" />
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ruda:400,900,700' rel='stylesheet' type='text/css'>
    <style>
		 @media (min-width: @screen-md-min) { .padder: {margin-left:10px;} }
	</style>

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

  <body class="mainbody">
  
  <div class="navbar navbar-inverse navbar-static-top" role="navigation">

	<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
          	<a href="index.php" class="navbar-brand" style="font-family: oswald;">Arc<span style="color:#4DA2BC">Folio</span></a>
    </div>

    <div style="" aria-expanded="true" class="navbar-collapse navbar-ex1-collapse collapse in">

        <div class="col-sm-6 col-md-8">
        <form class="navbar-form" role="search">
        <div style="width: 100%;" class="input-group">
            <input style="background-color: rgb(245, 245, 245);" class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
        </div>
        <ul class="nav navbar-nav pull-right">
          	<li style="padding-top: 0px; margin-top: 0px;">
                <a style="padding-top: 12px; padding-right: 0px;" href="http://www.twitter.com">
          <img src="res/images/twitter.fw.png" style="width: 25px;">
          		</a>
            </li>
            <li style="padding-top: 0px; margin-top: 0px; padding-right: 0px;">
                <a style="padding-top: 12px;" href="http://www.twitter.com">
          <img src="res/images/fa.fw.png" style="width: 25px;">
          		</a>
            </li>
            
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>


    </div>
</div>

</div>
   

    
        	<div class="container">
            	<div class="row" style="padding-left:10px; padding-right:10px; margin-bottom:15px;">
                	<div style="background-color: rgba(248, 248, 248, 0.9); background-image:url(res/images/background.fw.png); background-size:cover; background-repeat:no-repeat; box-shadow: 5px 5px 3px rgb(102, 102, 102); text-align: center; height: 150px; display: flex; align-items: center;" class="col-xs-12"><h1 style="font-family: &quot;Oswald&quot;,sans-serif; width: 100%; font-size:50px; margin: 0px;">Arc<span style="color:#4DA2BC">Folio</span>
                    <small style="margin-top: 0px; margin-bottom: 20px; color:#FFFFFF ">Killer cool slogan to reel folks in.</small></h1></div>
                </div>
                
                
                
            	<div class="row" style=" padding-left:10px; padding-right:10px;">
                            
                            <div class="col-md-8 col-md-push-4">
                                
                                <!--div class="row visible-xs-block visible-sm-block" style="margin-bottom: 10px; padding-right: 10px;">
                	<div class="col-xs-10" style="background-color: rgb(255, 255, 255); text-indent: 1cm; box-shadow: 5px 5px 3px rgb(102, 102, 102); padding-left:0;padding-right:0;">
                    
                                    	 <input style="border-radius: 0px; border: medium none; font-weight: bold; color: rgb(26, 0, 115);" class="form-control" placeholder="Search" required="">
                                    </div>
                                    	<div style="padding: 0px; margin: 0px;" class="col-xs-2">
                                        	<div style="margin-left: 10px; margin-right: -10px;" class="row"><button style="color: #EBEBEB; background-color: rgb(26, 0, 115); font-weight: bold; width: 100%; border: medium none; border-radius: 0px; box-shadow: 5px 5px 3px rgb(102, 102, 102); padding-top: 7px; padding-bottom: 8px; overflow:hidden;" type="button" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                </div>
                
                <!----------------------------------------------------------------------------------------------------------------->
                
                                <!---div class="row visible-lg-block visible-md-block" style=" padding-right: 10px; margin-left:0; margin-bottom:15px;">
                	<div class="col-xs-10" style="background-color: rgb(255, 255, 255); text-indent: 1cm; box-shadow: 5px 5px 3px rgb(102, 102, 102);padding-left:0;padding-right:0;">
                                    	 <input style="border-radius: 0px; border: medium none; font-weight: bold; color: rgb(26, 0, 115);" class="form-control" placeholder="Search" required="">
                                    </div>
                                    	<div style="padding: 0px; margin: 0px;" class="col-xs-2">
                                        	<div style="margin-left: 10px; margin-right: -10px;" class="row"><button style="color:  #EBEBEB; background-color: rgb(26, 0, 115); font-weight: bold; width: 100%; border: medium none; border-radius: 0px; box-shadow: 5px 5px 3px rgb(102, 102, 102); padding-top: 7px; padding-bottom: 8px;" type="button" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                </div-->
                				
                                <div class="row visible-lg-block visible-md-block" style="margin-left: 0;">
                                    <div class="col-xs-12" style="background-color: rgba(248, 248, 248, 0.9); text-align: center; box-shadow: 5px 5px 3px rgb(102, 102, 102); margin-bottom:15px; height:500px; display:flex; align-items:center;">
                                       <h3 style="font-family: &quot;ruda&quot;,sans-serif; width:100%; font-size: 48px; color: rgb(26, 0, 115); margin-top: 15px; font-weight: 700;">Some How it works stuff.<small style="font-family: &quot;ruda&quot;,sans-serif; margin-left: 19px; color: rgb(153, 153, 153); font-weight: 700;">Or whatever else.</small></h3>
                                    </div>
                                </div>
                
                
                            </div>
                            
                            
                            
                        <div class="col-md-4 col-md-pull-8">
                        	<div style="background-color: rgba(248, 248, 248, 0.9); text-align: center; box-shadow: 5px 5px 3px rgb(102, 102, 102); padding-bottom:15px; margin-bottom:15px;" class="row">
                            	<div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-12">
                                       <h3 style="font-family: &quot;ruda&quot;,sans-serif; color: rgb(26, 0, 115); margin-top: 15px; font-weight: 700;">Login.<small style="font-family: &quot;ruda&quot;,sans-serif; margin-left: 19px; color: rgb(153, 153, 153); font-weight: 700;">Create an Account</small></h3>
                                    </div>
                                </div>
                                
                                <div class="row" style="padding-bottom:15px;">
                                    <div class="col-xs-12">
                                        <form action="ui.php" class="form-signin">
                                            <div style="margin: 10px 0px; text-align: left; text-indent: 9px;">
                                                <label style="text-align: left;" for="inputEmail">Email address</label>
                                                <input style="text-align:center;font-weight: bold; color: rgb(26, 0, 115); border: 2px solid rgb(26, 0, 115); border-radius: 4px;" id="inputEmail" class="form-control" placeholder="Email address" required="false" autofocus type="email">
                                            </div>                                    
                                            <div style="margin: 10px 0px; text-align: left; text-indent: 9px;">
                                                <label for="inputPassword">Password</label>
                                                <input style="text-align:center;font-weight: bold; color: rgb(26, 0, 115); border: 2px solid rgb(26, 0, 115);border-radius: 4px;" id="inputPassword" class="form-control" placeholder="Password" required="" type="password">
                                             </div>
                                            <div class="checkbox">
                                              <label style="font-weight:bold;">
                                                <input value="remember-me" type="checkbox"> Remember me
                                              </label>
                                            </div>
                                            <button style="background-color:rgb(26, 0, 115); border-radius:4px;" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                          </form>
                                    </div>
                                </div>
                                </div>
                                </div>
                                
                
                			
                                <div class="row visible-xs-block visible-sm-block">
                                    <div class="col-xs-12" style="background-color: rgba(248, 248, 248, 0.9); text-align: center; box-shadow: 5px 5px 3px rgb(102, 102, 102); padding-bottom:15px; height:500px; display:flex; align-items:center;">
                                       <h3 style="font-family: &quot;ruda&quot;,sans-serif; width:100%; font-size: 48px; color: rgb(26, 0, 115); margin-top: 15px; font-weight: 700;">Some How it works stuff.<small style="font-family: &quot;ruda&quot;,sans-serif; margin-left: 19px; color: rgb(153, 153, 153); font-weight: 700;">Or whatever else.</small></h3>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                </div>
            </div>
            <div class="row" style=" min-height:300px; height:auto; margin:0;">
      		</div>
            <div class="row" style="background-color: rgb(210, 210, 210); margin-top: 10px; margin-left:0 ; margin-right:0; border-top: 2px solid rgb(152, 152, 152); padding-top: 10px;">
        		<div class="container">
                	<div style="padding-left: 15px; padding-right: 15px;" class="row">
                    <p style="font-weight: bold; float: left;">© ArcFolio 2015</p> <p style="float: right; font-weight: bold; font-size: 12px; margin-top: 2px;">Terms of Service | Privacy Policy | Join</p>
                    </div>
                    </div>
      		</div>
    <!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
