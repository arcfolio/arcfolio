//angular module for Arcfolio.//
var app = angular.module("Arcfolio", ['ngRoute', 'ui.bootstrap', 'vcRecaptcha', 'sessionService', 'ngSanitize', 'flow']);

/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//configure router - used for sending user to different pages dinamically.//*/
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
    target: 'upload.php',
    permanentErrors: [404, 500, 501],
    maxChunkRetries: 1,
    chunkRetryInterval: 5000,
    simultaneousUploads: 4
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
					  $scope.myInterval = 7000;
					  var slides = $scope.slides = [];
					  var count = Math.floor((Math.random()*6)+1);
					  
					  $scope.addSlide = function() {
						  count += 1;
						  if (count > 7) { count = 1;}
						var newWidth = 600 + slides.length + 1;
						slides.push({
						  image: 'http://thestarkmarket.com/arcfolio/res/images/cover' + count + '.jpg',
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


app.directive('backImg', function(){
    return function(scope, element, attrs){
        var url = attrs.backImg;
        element.css({
            'background-image': 'url(' + url +')', 'background-repeat': 'no-repeat', 'background-size': 'cover', 'height': '400px', 'background-position': 'center center', 'margin-top':'5px', 'width': '100%'
        });
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
app.controller('ModalDemoCtrltwo', function ($scope, $modal, $log) {

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
app.controller('ModalInstanceCtrl', function ($scope, $modalInstance, items) {

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
app.controller('loginController', function($scope, $http, Session, $location) {
		
		$scope.loginInfo = null;
		
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
					
					console.log(Session.isLoggedIn());
					console.log(Session.id);
					console.log(Session.email);
					console.log(Session.password);
					
					$location.path('/arcfolio/user');
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
			});
		};
		///////////////////////////////////////////////////////////////////////////////////////////////////
		
	
	});




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
	
});

app.controller('testController2', function($scope, Session) {
	
	$scope.email = Session.email;
	console.log("eamilasd "+Session.email);
	$scope.test = 'hello world';
	
});




