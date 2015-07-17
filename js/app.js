//angular module for Arcfolio.//
var app = angular.module("Arcfolio", ['ngRoute', 'ngTouch', 'ngProgress', 'ui.bootstrap', 'vcRecaptcha', 'sessionService', 'tabService', 'imgService', 'settingsService', 'ngSanitize', 'ngAnimate', 'flow', 'arcfolioFilters']);

/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//configure router - used for sending user to different pages dynamically.//*/
app.config(function($routeProvider, $locationProvider, flowFactoryProvider) 
{
	
	
	console.log("router working...");
    $locationProvider.html5Mode(true);
  	$routeProvider
	.when('/arcfolio/index.php', 
	{
	   	templateUrl: 'html_plugins/design1.html',
	   	controller: 'testController'
	})
	
	
	.when('/arcfolio/user', 
		{
		templateUrl: 'html_plugins/ui.html',
		controller: 'testController2'
  	})
	
	.when('/arcfolio/company', 
		{
		templateUrl: 'html_plugins/company.html',
		controller: 'testController2'
  	})
	
	.when('/arcfolio/tempIntern', 
		{
		templateUrl: 'html_plugins/tempHolder.html',
		controller: 'testController2'
  	})
	
	.when('/arcfolio/uploadtest', 
		{
		templateUrl: 'html_plugins/uploadtest.html',
		controller: 'testController2'
  	})
	//send all other pages back to index.
    .otherwise(
	{
		redirectTo: '/arcfolio/index.php'
	});
	
  flowFactoryProvider.defaults = {
    target: 'php_library/uploader.php',
    permanentErrors: [404, 500, 501],
    maxChunkRetries: 1,
    chunkRetryInterval: 5000,
    simultaneousUploads: 8,
	testChunks: false
  };
  flowFactoryProvider.on('catchAll', function (event) {
    console.log('catchAll', arguments);
  });
});

	

app.run(function($rootScope) {
	
	
	//this hides the re-enter password input in default.html//
	$rootScope.registerBool = false;
	$rootScope.response = null;
	
	
	//this toggles the re-enter password input.
	$rootScope.register = function() {
		console.log("clicked");
		if($rootScope.registerBool == false)
		{ $rootScope.registerBool = true; }
		else if($rootScope.registerBool == true)
		{ $rootScope.registerBool = false }
		};
	
});


/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
** footer ** */

app.directive('footer', function()
{
	return	{
			  restrict: 'E',
			  templateUrl: 'html_plugins/footer.html'
			};
});


/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
** navbar ** */

app.directive('navbar', function()
{
	return	{
			  restrict: 'E',
			  templateUrl: 'html_plugins/navBar.html'
			};
});


/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
** newsfeed ** */
//will need radical rewrite.
	
app.directive('newsfeed', function()
{
	return	{
		  		restrict: 'E',
		  		controller: ['$scope', function($scope)
				{
					  $scope.myInterval = 4000;
					  var slides = $scope.slides = [];
					  var count = Math.floor((Math.random()*6)+1);
					  
					  $scope.addSlide = function() {
						  count += 1;
						  if (count > 4) { count = 1;}
						var newWidth = 600 + slides.length + 1;
						slides.push({
						  image: 'http://thestarkmarket.com/arcfolio/res/images/TestBanner' + count + '.jpg',
						  text: ['Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et ipsum a sem elementum rhoncus. Pellentesque eleifend quam tellus, id mollis mi pretium ut. Cras efficitur eros a vestibulum rhoncus. Nam magna sapien, congue ac metus sed, eleifend gravida ipsum. Fusce elit metus, auctor sed gravida eget, posuere sed mauris. Proin commodo metus non risus porttitor ultricies. Pellentesque ultricies scelerisque tincidunt.',
						  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et ipsum a sem elementum rhoncus. Pellentesque eleifend quam tellus, id mollis mi pretium ut. Cras efficitur eros a vestibulum rhoncus. Nam magna sapien, congue ac metus sed, eleifend gravida ipsum. Fusce elit metus, auctor sed gravida eget, posuere sed mauris. Proin commodo metus non risus porttitor ultricies. Pellentesque ultricies scelerisque tincidunt.',
						  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et ipsum a sem elementum rhoncus. Pellentesque eleifend quam tellus, id mollis mi pretium ut. Cras efficitur eros a vestibulum rhoncus. Nam magna sapien, congue ac metus sed, eleifend gravida ipsum. Fusce elit metus, auctor sed gravida eget, posuere sed mauris. Proin commodo metus non risus porttitor ultricies. Pellentesque ultricies scelerisque tincidunt.',
						  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et ipsum a sem elementum rhoncus. Pellentesque eleifend quam tellus, id mollis mi pretium ut. Cras efficitur eros a vestibulum rhoncus. Nam magna sapien, congue ac metus sed, eleifend gravida ipsum. Fusce elit metus, auctor sed gravida eget, posuere sed mauris. Proin commodo metus non risus porttitor ultricies. Pellentesque ultricies scelerisque tincidunt.',
						  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et ipsum a sem elementum rhoncus. Pellentesque eleifend quam tellus, id mollis mi pretium ut. Cras efficitur eros a vestibulum rhoncus. Nam magna sapien, congue ac metus sed, eleifend gravida ipsum. Fusce elit metus, auctor sed gravida eget, posuere sed mauris. Proin commodo metus non risus porttitor ultricies. Pellentesque ultricies scelerisque tincidunt.',
						  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et ipsum a sem elementum rhoncus. Pellentesque eleifend quam tellus, id mollis mi pretium ut. Cras efficitur eros a vestibulum rhoncus. Nam magna sapien, congue ac metus sed, eleifend gravida ipsum. Fusce elit metus, auctor sed gravida eget, posuere sed mauris. Proin commodo metus non risus porttitor ultricies. Pellentesque ultricies scelerisque tincidunt.',
						  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et ipsum a sem elementum rhoncus. Pellentesque eleifend quam tellus, id mollis mi pretium ut. Cras efficitur eros a vestibulum rhoncus. Nam magna sapien, congue ac metus sed, eleifend gravida ipsum. Fusce elit metus, auctor sed gravida eget, posuere sed mauris. Proin commodo metus non risus porttitor ultricies. Pellentesque ultricies scelerisque tincidunt.',
						  ][slides.length % 7] + ' ' +
							['HEADER #1','HEADER #2','HEADER #3','HEADER #4','HEADER #5','HEADER #6','HEADER #7'][slides.length % 7]
						});
					  };
					  for (var i=0; i<7; i++) {
						$scope.addSlide();
					  }
				}],
				templateUrl: 'html_plugins/newsfeed.html'
			};

});


app.directive('mainImg', function($rootScope){
    return function(scope, element, attrs){
       // var url = attrs.mainImg;
        element.css({ 'background-image': 'url(' + $rootScope.mainimg +')', 'position':'absolute', 'height':'100%', 'width':' 100%', 'background-repeat':' no-repeat', 'background-size':' cover', 'background-position':' center center', ' position':'absolute', ' min-height':'800px' });
    	scope.$watch(function() {
			  return $rootScope.mainimg;
			}, function() {
				element.css({ 'background-image': 'url(' + $rootScope.mainimg +')', 'position':'absolute', 'height':'100%', 'width':' 100%', 'background-repeat':' no-repeat', 'background-size':' cover', 'background-position':' center center', ' position':'absolute', ' min-height':'800px' });
    			console.log("runs on change");
			}, true);
	};
});

app.directive('backImg', function(){
    return function(scope, element, attrs){
        var url = attrs.backImg;
        element.css({
            'background-image': 'url(' + url +')', 'background-repeat': 'no-repeat', 'background-size': 'cover', 'height': '400px', 'background-position': 'center center', 'margin-top':'5px', 'width': '100%'
        });
    };
});

app.controller('imageviewer', function ($scope) {

    // Set of Photos
    $scope.photos = [
        {src: 'http://farm9.staticflickr.com/8042/7918423710_e6dd168d7c_b.jpg', desc: 'Image 01'},
        {src: 'http://farm9.staticflickr.com/8449/7918424278_4835c85e7a_b.jpg', desc: 'Image 02'},
        {src: 'http://farm9.staticflickr.com/8457/7918424412_bb641455c7_b.jpg', desc: 'Image 03'},
        {src: 'http://farm9.staticflickr.com/8179/7918424842_c79f7e345c_b.jpg', desc: 'Image 04'},
        {src: 'http://farm9.staticflickr.com/8315/7918425138_b739f0df53_b.jpg', desc: 'Image 05'},
        {src: 'http://farm9.staticflickr.com/8461/7918425364_fe6753aa75_b.jpg', desc: 'Image 06'}
    ];

    // initial image index
    $scope._Index = 0;

    // if a current image is the same as requested image
    $scope.isActive = function (index) {
        return $scope._Index === index;
    };

    // show prev image
    $scope.showPrev = function () {
        $scope._Index = ($scope._Index > 0) ? --$scope._Index : $scope.photos.length - 1;
    };

    // show next image
    $scope.showNext = function () {
        $scope._Index = ($scope._Index < $scope.photos.length - 1) ? ++$scope._Index : 0;
    };

    // show a certain image
    $scope.showPhoto = function (index) {
        $scope._Index = index;
    };
});

app.controller('ModalDemoCtrl', function ($scope, $modal, $log) {
	
  $scope.items = ['item1', 'item2', 'item3'];

  $scope.animationsEnabled = true;

  $scope.open = function (size) {

    var modalInstance = $modal.open({
      animation: $scope.animationsEnabled,
      templateUrl: 'myModalContent.html',
      controller: 'ModalInstanceCtrl',
      size: size,
      resolve: {
        items: function () {
          return $scope.items;
        }
      }
    });

    modalInstance.result.then(function (selectedItem) {
      $scope.selected = selectedItem;
    }, function () {
      $log.info('Modal dismissed at: ' + new Date());
    });
  };

  $scope.toggleAnimation = function () {
    $scope.animationsEnabled = !$scope.animationsEnabled;
  };

});
app.controller('ModalDemoCtrltwo', function ($scope, $modal, $log, $rootScope) {
	
	$scope.imguploader = false;
	
	$scope.imgupload = function(tab){
		
			$scope.tabnum = tab;
			$rootScope.tabnum = tab;
			$scope.imguploader = true;
			console.log("image upload");
		};

  $scope.items = ['item1', 'item2', 'item3'];

  $scope.animationsEnabled = true;

  $scope.open = function (size) {

    var modalInstance = $modal.open({
      animation: $scope.animationsEnabled,
      templateUrl: 'myModalContenttwo.html',
      controller: 'ModalInstanceCtrl',
      size: size,
      resolve: {
        items: function () {
          return $scope.items;
        }
      }
    });

    modalInstance.result.then(function (selectedItem) {
      $scope.selected = selectedItem;
    }, function () {
      $log.info('Modal dismissed at: ' + new Date());
    });
  };

  $scope.toggleAnimation = function () {
    $scope.animationsEnabled = !$scope.animationsEnabled;
  };

});

// Please note that $modalInstance represents a modal window (instance) dependency.
// It is not the same as the $modal service used above.

app.controller('flowuploader', function ($scope,flowFactory, Session, Img, Settings, $http, $rootScope, $q) {
	
	$scope.testupload = 
	function()
	{
		$scope.$flow.upload();
		$scope.$on('flow::complete', function () { 
			console.log("works on completion");
		 	$scope.getImgs(Session.id);
			$scope.$apply(
				function(){		$scope.$flow.cancel();	$rootScope.imgs = Img.myimgs;	}
			);
		 
		 });
	};
	$scope.testupload2 = 
	function()
	{
		$scope.$flow.upload();
		$scope.$on('flow::complete', function () { 
			console.log("works on completion");
			var thelink = "http://www.thestarkmarket.com/arcfolio/users/" + Session.id + "/main.jpg";
			console.log(thelink);
			$scope.getMain(thelink).then(function() {
															console.log("asdasdfaf");
															var time = new Date().getTime() / 1000;
															Session.mainimg = thelink + "?" + time;
															$rootScope.mainimg = Session.mainimg;
															$scope.$flow.cancel();
															console.log($rootScope.mainimg);
															//$scope.$apply(
															//			function(){	$scope.$flow.cancel(); $rootScope.mainimg = Session.mainimg; console.log(Session.mainimg);}
															//);
														});
			
		 
		 });
	};
	
	$scope.getMain = function(src) {
     var deferred = $q.defer();
     var image = new Image();
    image.onerror = function() {
        deferred.resolve(false);
    };
    image.onload = function() {
        deferred.resolve(true);
    };
    image.src = src;
     return deferred.promise;
};
		  
		  //loading animation goes here//
		  
		$scope.getImgs = function(data){
		
		 var config = {
			params: {
			  imgData : data
			}
		  };
		  
		  //loading animation goes here//
		  
		$http.post("php_plugins/imgs.php", null, config)
			.success(function (data, status, headers, config)
			{
			  //finish animation process here//
			 	Img.myimgs = data;
				console.log("img data ");
				console.log( data);
			  
			})
			//there was an error sending the data to php.//
			.error(function (data, status, headers, config)
			{
					return console.log("CONNECTIVITY ERROR");
			})
			.then(function(){ Img.count(); $rootScope.imgs = Img.myimgs; });
			
		};
	
});

app.controller('ModalInstanceCtrl', function ($scope, $modalInstance, items, $timeout, Tab, $http, $rootScope, Session, flowFactory) {
	
	$scope.portfolio = true;
	
	$scope.onPortfolio = function()
	{
		if($scope.portfolio == false){ $scope.portfolio = true; }else{$scope.portfolio = false;}
	};
	
	
	$rootScope.userId = Session.id;
	
	 $scope.config = {
		 testChunks: false,
    query: function (flowFile, flowChunk) {
      // function will be called for every request
      return {
        tabId: $rootScope.tabId, userId: $rootScope.userId
      };
    }
  };
	
	 $scope.config2 = {
		 testChunks: false,
    query: function (flowFile, flowChunk) {
      // function will be called for every request
      return {
        mainImg: true, userId: $rootScope.userId
      };
    }
  };
  
	 $scope.config3 = {
		 testChunks: false,
    query: function (flowFile, flowChunk) {
      // function will be called for every request
      return {
        pdf: true, userId: $rootScope.userId
      };
    }
  };
	
$scope.imguploader = false;
$scope.loader = false;
$scope.success= false;

////////////////////////////////

	var inputChangedPromise;
	
$scope.update = function(data){
    if(inputChangedPromise){
        $timeout.cancel(inputChangedPromise);
    }
    inputChangedPromise = $timeout(function()
	{
		
		 var config = {
			params: {
			  tabData : data
			}
		  };
		  
		  $scope.loader = true;
		$http.post("php_plugins/updatetab.php", null, config)
			.success(function (data, status, headers, config)
			{
			  //finish animation process here//
			 	console.log(data);
				$scope.loader = false;
				$scope.success = true;
				var out = $timeout(function(){$scope.success=false;}, 1500);
			  
			})
			//there was an error sending the data to php.//
			.error(function (data, status, headers, config)
			{
					console.log("CONNECTIVITY ERROR");
					$scope.loader = false;
			})
			.then(function(){});
	
	},1000);
}

////////////////////////////////

	var inputChangedPromise;
	
$scope.updateimg = function(data, type){
	if(type == 'name'){data.type = true;}
	else{data.type = false;};
	console.log(data);
    if(inputChangedPromise){
        $timeout.cancel(inputChangedPromise);
    }
    inputChangedPromise = $timeout(function()
	{
		
		 var config = {
			params: {
			  imgData : data
			}
		  };
		  
		  var imgid = data.id;
		  $scope.loaderimg = data.id;
		  $scope.type = type;
		$http.post("php_plugins/updateimg.php", null, config)
			.success(function (data, status, headers, config)
			{
			  //finish animation process here//
			 	console.log(data);
				$scope.loaderimg = false;
				$scope.successimg = imgid;
				console.log('successimg id ' + $scope.successimg);
				var out = $timeout(function(){	$scope.successimg = false;	}, 1500);
				
			})
			//there was an error sending the data to php.//
			.error(function (data, status, headers, config)
			{
					console.log("CONNECTIVITY ERROR");
					$scope.loaderimg = false;
			})
			.then(function(){});
	
	},1000);
}


$scope.updatesetting = function(data, type){
	data.type = type;
	console.log(data);
    if(inputChangedPromise){
        $timeout.cancel(inputChangedPromise);
    }
    inputChangedPromise = $timeout(function()
	{
		console.log(data);
		
		 var config = {
			params: {
			  settingData : data
			}
		  };
		  
		  $scope.loadersetting = true;
		  $scope.settingtype = type;
		  console.log("setting type ");
		  console.log(type);
		$http.post("php_plugins/updatesetting.php", null, config)
			.success(function (data, status, headers, config)
			{
			  //finish animation process here//
			 	console.log(data);
				console.log("hiting here");
				$scope.loadersetting = false;
				$scope.successsetting = true;
				var out = $timeout(function(){$scope.successsetting=false;}, 1500);
				
			})
			//there was an error sending the data to php.//
			.error(function (data, status, headers, config)
			{
					console.log("CONNECTIVITY ERROR");
					$scope.loadersetting = false;
			})
			.then(function(){});
	
	},1000);
}
	
	$scope.imgupload = function(tab, id){
		
			 $scope.config = {
    query: function (flowFile, flowChunk) {
      // function will be called for every request
      return {
        id: 2, source: 'flow_query'
      };
    }
  };
		
			$scope.tabnum = tab;
			$rootScope.tabnum = tab;
			$scope.tabid = id;
			$rootScope.tabId = id;
			console.log($scope.tabnum);
			console.log($scope.tabid);
			
			if($scope.imguploader == false)
			{
			$scope.imguploader = true;
			}else{
			$scope.imguploader = false;
			}
			console.log("image upload");
		};
		
  $scope.items = items;
  $scope.selected = {
    item: $scope.items[0]
  };

  $scope.ok = function () {
    $modalInstance.close($scope.selected.item);
  };

  $scope.cancel = function () {
    $modalInstance.dismiss('cancel');
  };
});

/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
** registerController ** */
app.controller('loginController', function($rootScope, $scope, $http, Session, Img, Settings, Tab, $location) {
		
		$scope.loginInfo = null;
		$scope.response = "";
		
		$scope.getTabs = function(data){
		
		 var config = {
			params: {
			  tabData : data
			}
		  };
		  
		  //loading animation goes here//
		  
		$http.post("php_plugins/tabs.php", null, config)
			.success(function (data, status, headers, config)
			{
			  //finish animation process here//
			 	Tab.mytabs = data;
				console.log("tab data " + data);
				if(Tab.mytabs == "")
				{
					console.log("tabs are null");
					Tab.mytabs = [ {'deleted' : 0, 'lastUpdated' : null, 'name' : 'tab #1' , 'ownerId' : Session.id, 'real': false, 'id': null } ];
				}
			  
			})
			//there was an error sending the data to php.//
			.error(function (data, status, headers, config)
			{
					return console.log("CONNECTIVITY ERROR");
			})
			.then(function(){ Tab.count(); Tab.fillTabs(Session.id); $rootScope.tabs = Tab.mytabs; });
			
		};
		
		$scope.getImgs = function(data){
		
		 var config = {
			params: {
			  imgData : data
			}
		  };
		  
		  //loading animation goes here//
		  
		$http.post("php_plugins/imgs.php", null, config)
			.success(function (data, status, headers, config)
			{
			  //finish animation process here//
			 	Img.myimgs = data;
				console.log("img data ");
				console.log( data);
			  
			})
			//there was an error sending the data to php.//
			.error(function (data, status, headers, config)
			{
					return console.log("CONNECTIVITY ERROR");
			})
			.then(function(){ Img.count(); $rootScope.imgs = Img.myimgs; });
			
		};
		
		$scope.getSettings = function(data){
		
		 var config = {
			params: {
			  settingData : data
			}
		  };
		  
		  //loading animation goes here//
		  
		$http.post("php_plugins/settings.php", null, config)
			.success(function (data, status, headers, config)
			{
			  //finish animation process here//
			 	Settings.mysettings = data;
				console.log("setting data ");
				console.log( data);
			  
			})
			//there was an error sending the data to php.//
			.error(function (data, status, headers, config)
			{
					return console.log("CONNECTIVITY ERROR");
			})
			.then(function(){ $rootScope.settings = Settings.mysettings; console.log("settings: "); console.log($rootScope.settings[0]); });
			
		};
		
		$scope.login = function (data) 
		{
			
			console.log("login clicked");
		  //configure get data to send to php//
		  var config = {
			params: {
			  loginData : data
			}
		  };
		  
		  //loading animation goes here//
		  
		  $http.post("php_plugins/login.php", null, config)
			.success(function (data, status, headers, config)
			{
			  //finish animation process here//
			  
			  
			  //check if response data shows a backend failure.//
			  if(data.failure == true || data == null)
			  {
				  //process backend failure//
				  	console.log("ERROR://///////////");
					console.log(data);
					
					
					$scope.response = "ERROR: Your email or password is incorrect.";
					$scope.responsecolor = "red";
					$scope.responsedisable = "";
					
			  }
			  //response data is without backend failure//
			  else if(data.email != null)
			  {
				  //process correct data//
				  	console.log("SUCESSFUL SESSION CREATION");
					
			  		Session.login(data);
					
					$rootScope.mainimg = Session.mainimg;
					
					console.log(Session.isLoggedIn());
					console.log(Session.id);
					console.log(Session.email);
					console.log(Session.password);
					console.log(Session.mainimg);
					
					if(Session.isCompany())
					{
						$location.path('/arcfolio/company');
					}
					else
					{
						$location.path('/arcfolio/user');
					}
			  }
			  else
			  {
				  console.log(data); console.log("hmmm");
				  
					$scope.response = "ERROR: Your email or password is incorrect.";
					$scope.responsecolor = "red";
					$scope.responsedisable = "";
				  
				  }
			  
			})
			//there was an error sending the data to php.//
			.error(function (data, status, headers, config)
			{
				
					$scope.response = "ERROR: You do not have access to the Internet.";
					$scope.responsecolor = "red";
					$scope.responsedisable = "";
					console.log("CONNECTIVITY ERROR");
			})
			.then(function(){
					$scope.getTabs(Session.id);
					$scope.getImgs(Session.id);
					$scope.getSettings(Session.id);
					});
		};
		///////////////////////////////////////////////////////////////////////////////////////////////////
		
	
	});

/*
app.controller('loaderController', function($scope, $timeout, ngProgress){
	
	ngProgress.color('#87B9C3');
	ngProgress.height('3px');
	ngProgress.start();
	//$timeout(ngProgress.complete(), 5000);
	
	});
*/

/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
** registerController ** */
app.controller('registerController', function($scope, $http, vcRecaptchaService) {
	
		
		$scope.setResponse = function (response) {
        // send the `response` to your server for verification.
		console.log(response);console.log("worsk");
    };
		
		
	$scope.createAccount = function(data)
		{
			
			if(data != null)
			{
			data.response = vcRecaptchaService.getResponse();
			}
			
			console.log("createaccount clicked");
		  //configure get data to send to php//
		  var config = {
			params: {
			  accountData : data
			}
		  };
		  
		  //loading animation goes here//
		  
		  $http.post("php_plugins/createAccount.php", null, config)
			.success(function (data, status, headers, config)
			{
			  //finish animation process here//
			  
			  $scope.data = data;
			  
			  //check if response data shows a backend failure.//
			  if($scope.data.failure == true || $scope.data == null)
			  {
				  //process backend failure//
				  	console.log("ERROR://///////////");
					console.log($scope.data);
					
					$scope.data = null;
					
					$scope.response = "ERROR: " + data.msg;
					$scope.responsecolor = "red";
					$scope.responsedisable = "";
			  }
			  //response data is without backend failure//
			  else if($scope.data.failure == false)
			  {
				  //process correct data//
				  	console.log("SUCESSFUL ACCOUNT CREATION");
					console.log($scope.data);
					$scope.response = "SUCCESS: " + data.msg;
					$scope.responsecolor = "green";
					$scope.responsedisable = "disabled";
			  }
			  else
			  {
				  console.log(data);}
			  
			})
			//there was an error sending the data to php.//
			.error(function (data, status, headers, config)
			{
					console.log("CONNECTIVITY ERROR");
			});
		};
		///////////////////////////////////////////////////////////////////////////////////////////////////
		
	
});


//these two are test controllers.
app.controller('testController', function($scope) {
	
	$scope.test = 'hello world';
	
	$scope.register = true;
	
	$scope.onRegister = function()
	{
		if($scope.register == false){ $scope.register = true; }else{$scope.register = false;}
	};
	
	
});


app.controller('testController2', function($scope, Session, Img, Settings, Tab) {
	
	$scope.email = Session.email;
	console.log("eamilasd "+Session.email);
	$scope.test = 'hello world';
	
	
	
});

app.controller('maintabs', function($scope, Session, Img, Settings, Tab) {
	
	});




