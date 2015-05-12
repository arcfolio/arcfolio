//angular module for Arcfolio.//
var app = angular.module("Arcfolio", ['ngRoute', 'ui.bootstrap', 'vcRecaptcha']);

/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//configure router - used for sending user to different pages dinamically.//*/
app.config(function($routeProvider, $locationProvider) 
{
	
	
	console.log("router working...");
    $locationProvider.html5Mode(true);
  	$routeProvider
	.when('/arcfolio/index.php', 
	{
	   	templateUrl: 'html_plugins/default.html',
	   	controller: 'testController'
	})
	
	
	.when('/arcfolio/user', 
		{
		templateUrl: 'html_plugins/userInterface.html',
		controller: 'testController2'
  	})
	//send all other pages back to index.
    .otherwise(
	{
		redirectTo: '/arcfolio/index.php'
	});
	
	
			
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
					  
					  $scope.addSlide = function() {
						var newWidth = 600 + slides.length + 1;
						slides.push({
						  image: 'http://placekitten.com/' + newWidth + '/300',
						  text: ['Serious Design work needed.','Angular functionality works tho.','so now its just kittens.','Even though Im a dog person.'][slides.length % 4] + ' ' +
							['', 'Kittys', 'Felines', 'Cutes'][slides.length % 4]
						});
					  };
					  for (var i=0; i<4; i++) {
						$scope.addSlide();
					  }
				}],
				templateUrl: 'html_plugins/newsfeed.html'
			};

});


/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
** registerController ** */
app.controller('registerController', function($scope) {
	
	//this hides the re-enter password input in default.html//
	$scope.registerBool = false;
	
	
	//this toggles the re-enter password input.
	$scope.register = function() {
		console.log("clicked");
		if($scope.registerBool == false)
		{ $scope.registerBool = true; }
		else if($scope.registerBool == true)
		{ $scope.registerBool = false }
		};
	
});


//these two are test controllers.
app.controller('testController', function($scope) {
	
	$scope.test = 'hello world';
	
});

app.controller('testController2', function($scope) {
	
	$scope.test = 'hello world';
	
});