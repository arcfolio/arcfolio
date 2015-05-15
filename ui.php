


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
	<link rel="stylesheet" type="text/css" href="res/CSS/main.css" />
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
  
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

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
                <a style="padding-top: 12px;" href="http://www.facebook.com">
          <img src="res/images/fa.fw.png" style="width: 25px;">
          		</a>
            </li>
            
            <li><a href="#about">Logout</a></li>
          </ul>


    </div>
</div>

</div>

    
        	<div class="container" style="margin-top:65px;">
                
            	<div class="row" style=" padding-left:10px; padding-right:10px;">
                            
                        <div style="position:fixed; width: 243px;">
          <!-------------------------------------------------------------------------------------------------------------------------------->
          <!-------------------------------------------------------------------------------------------------------------------------------->
          <!-------------------------------------------------------------------------------------------------------------------------------->
          <!-------------------------------------------------------------------------------------------------------------------------------->
                        
                        	<!---div  class="row visible-md-block visible-lg-block" style="position: fixed; width: 25%; padding-right: 39px;">
                            	<div class="col-xs-12">
                                <div class="row" style="background-color: rgba(248, 248, 248, 0.9); text-align: center; box-shadow: 5px 5px 3px rgb(102, 102, 102); margin-bottom:15px; margin-bottom:10px">
                                    
                                    <div class="media">
                                      <div style="padding: 9px;" class="media-left">
                                        <a href="#">
                                          <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjE0LjUiIHk9IjMyIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="width: 64px; height: 64px;">
                                        </a>
                                      </div>
                                      <div style="text-align: center; padding-left: 10px;" class="media-body">
                                        <h3 style=" font-size:20px; font-family: &quot;ruda&quot;,sans-serif; color: rgb(26, 0, 115); font-weight: 700; margin-top: 17px;" class="media-heading" id="media-heading">Curtis Reed</h3>
                                        <p style="font-family: &quot;ruda&quot;,sans-serif; color: rgb(153, 153, 153); font-weight: 700; margin-left: 19px; font-size: 10px; text-align: left; width: 100%;">Manage Account</p></div>
                                      </div>
                                      
    								</div>
                                
                                <div class="row" style="background-color: rgba(248, 248, 248, 0.9); text-align: center; box-shadow: 5px 5px 3px rgb(102, 102, 102); margin-bottom:15px; margin-bottom:10px">
                                    <div class="col-xs-12">
                                    	<div class="row">
                                        	<div class="col-xs-3">
                                            	<img src="res/images/icons/add_folder.png" class="ui_icons"/>
                                            </div>
                                        	<div class="col-xs-3">
                                            	<img src="res/images/icons/add_file.png"  class="ui_icons"/>
                                            </div>
                                        	<div class="col-xs-3">
                                            	<img src="res/images/icons/trash.png"  class="ui_icons"/>
                                            </div>
                                        	<div class="col-xs-3">
                                            	<img src="res/images/icons/downloadfile2.fw.png"  class="ui_icons"/>
                                            </div>
                                       	</div>
                                    </div>
                                </div>
                                
                                <div class="row" style="background-color: rgba(248, 248, 248, 0.9); text-align: center; box-shadow: 5px 5px 3px rgb(102, 102, 102); margin-bottom:15px; margin-bottom:10px">
                                    <div class="col-xs-12">
                                    	<div style="padding: 5px;" class="row">
                                                                                                              
                                            <div style="height: 14px; margin-bottom: 5px;" class="progress">
                                              <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                                <span style="line-height:13px;">20% Full</span>
                                              </div>
                                            </div>
                                            <p style="font-family: &quot;ruda&quot;,sans-serif; color: rgb(153, 153, 153); font-weight: 700; font-size: 10px; text-align: center; margin: 0px; padding: 0px;">0.2 Gb / 4 Gb used.</p>
                                       	</div>
                                    </div>
                                </div>
                                
          </div></div>
          
          <!-------------------------------------------------------------------------------------------------------------------------------->
          <!-------------------------------------------------------------------------------------------------------------------------------->
          <!-------------------------------------------------------------------------------------------------------------------------------->
          <!-------------------------------------------------------------------------------------------------------------------------------->
                        	<div  class="row" style="margin-right: 0px;>
                            	<div class="col-xs-12">
                                <div class="row" style="background-color: rgba(248, 248, 248, 0.9); text-align: center; box-shadow: 5px 5px 3px rgb(102, 102, 102); margin-bottom:15px; margin-bottom:10px; margin-right: 0px;">
                                    
                                    <div class="media">
                                      <div style="text-align: center; padding-left: 10px;" class="media-body">
                                        <h3 style=" font-size:20px; font-family: &quot;ruda&quot;,sans-serif; color: rgb(26, 0, 115); font-weight: 700; margin-top: 17px;" class="media-heading" id="media-heading">Curtis Reed</h3>
                                        <p style="font-family: &quot;ruda&quot;,sans-serif; color: rgb(153, 153, 153); font-weight: 700; margin-left: 19px; font-size: 10px; text-align: left; width: 100%;">Manage Account</p></div>
                                      </div>
                                      
    								</div>
                                
                                <div class="row" style="background-color: rgba(248, 248, 248, 0.9); text-align: center; box-shadow: 5px 5px 3px rgb(102, 102, 102); margin-bottom:15px; margin-bottom:10px; margin-right: 0px;">
                                    <div class="col-xs-12">
                                    	<div class="row">
                                        	<div class="col-xs-3">
                                            	<img src="res/images/icons/add_folder.png" class="ui_icons"/>
                                            </div>
                                        	<div class="col-xs-3">
                                            	<img src="res/images/icons/add_file.png"  class="ui_icons"/>
                                            </div>
                                        	<div class="col-xs-3">
                                            	<img src="res/images/icons/trash.png"  class="ui_icons"/>
                                            </div>
                                        	<div class="col-xs-3">
                                            	<img src="res/images/icons/downloadfile2.fw.png"  class="ui_icons"/>
                                            </div>
                                       	</div>
                                    </div>
                                </div>
                                
                                <div class="row" style="background-color: rgba(248, 248, 248, 0.9); text-align: center; box-shadow: 5px 5px 3px rgb(102, 102, 102); margin-bottom:15px; margin-bottom:10px; margin-right: 0px;">
                                    <div class="col-xs-12">
                                    	<div style="padding: 5px;" class="row">
                                                                                                              
                                            <div style="height: 14px; margin-bottom: 5px;" class="progress">
                                              <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 35%;">
                                                <span style="line-height:13px;">35% Full</span>
                                              </div>
                                            </div>
                                            <p style="font-family: &quot;ruda&quot;,sans-serif; color: rgb(153, 153, 153); font-weight: 700; font-size: 10px; text-align: center; margin: 0px; padding: 0px;">1.4 Gb / 4 Gb used.</p>
                                       	</div>
                                    </div>
                                </div>
                                
          </div></div>
          
          <!-------------------------------------------------------------------------------------------------------------------------------->
          <!-------------------------------------------------------------------------------------------------------------------------------->
          <!-------------------------------------------------------------------------------------------------------------------------------->
          <!-------------------------------------------------------------------------------------------------------------------------------->
          <!-------------------------------------------------------------------------------------------------------------------------------->
                                
                                </div>
                                
                
                				<div style="width: 75%; margin-left: 248px;">
                                	<div style="margin-left: 0px; margin-bottom: 15px;" class="row">
                                    <div class="col-xs-12" style="background-color: rgba(248, 248, 248, 0.9); text-align: center; box-shadow: 5px 5px 3px rgb(102, 102, 102); margin-bottom:15px; height:500px; display:flex; align-items:center;">
                                       <h3 style="font-family: &quot;ruda&quot;,sans-serif; width:100%; font-size: 48px; color: rgb(26, 0, 115); margin-top: 15px; font-weight: 700;">Some How it works stuff.<small style="font-family: &quot;ruda&quot;,sans-serif; margin-left: 19px; color: rgb(153, 153, 153); font-weight: 700;">Or whatever else.</small></h3>
                                    </div>
                                
                
                                    <div class="col-xs-12" style="background-color: rgba(248, 248, 248, 0.5); box-shadow: 5px 5px 3px rgb(102, 102, 102); text-align: left; padding: 3px;">
                                       <h3 style="font-family: &quot;ruda&quot;,sans-serif; width: 100%; color: rgb(26, 0, 115); font-weight: 700; margin: 0px; padding: 3px; font-size: 15px;">://Handdrawings/</h3>
                                    </div>
                                    </div>
                                    
                                    <div style="margin-left: 0px; padding-bottom:15px;" class="row">
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/hd1.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/hd2.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/hd3.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                	<div style="margin-left: 0px; margin-bottom: 15px;" class="row">
                                    <div class="col-xs-12" style="background-color: rgba(248, 248, 248, 0.5); box-shadow: 5px 5px 3px rgb(102, 102, 102); text-align: left; padding: 3px;">
                                       <h3 style="font-family: &quot;ruda&quot;,sans-serif; width: 100%; color: rgb(26, 0, 115); font-weight: 700; margin: 0px; padding: 3px; font-size: 15px;">://autocad/</h3>
                                    </div>
                                    </div>
                                    
                                    <div style="margin-left: 0px; margin-bottom:15px;" class="row">
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/at1.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/at2.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/at1.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/at2.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/at3.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/at4.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                	<div style="margin-left: 0px; margin-bottom: 15px;" class="row">
                                    <div class="col-xs-12" style="background-color: rgba(248, 248, 248, 0.5); box-shadow: 5px 5px 3px rgb(102, 102, 102); text-align: left; padding: 3px;">
                                       <h3 style="font-family: &quot;ruda&quot;,sans-serif; width: 100%; color: rgb(26, 0, 115); font-weight: 700; margin: 0px; padding: 3px; font-size: 15px;">://Models/</h3>
                                    </div>
                                    </div>
                                    
                                    <div style="margin-left: 0px;" class="row">
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/m1.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/m2.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/m3.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/m4.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/m5.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/m6.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/m7.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/m8.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="row" id="padd">
                                                <div class="col-xs-12 ui_imgs" style="background-image:url(res/images/userimages/m9.jpg);">
                                                	<div class="imagefadein"></div>
                                                </div>
                                            </div>
                                        </div>
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
