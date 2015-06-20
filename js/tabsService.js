// JavaScript Document


/*global angular, Recaptcha */
(function (ng) {
    'use strict';

    ng.module('tabService', []);

}(angular));

/*global angular */
(function (ng) {
    'use strict';

    var app = ng.module('tabService');

    /**
     * An angular service to wrap the reCaptcha API
     */
	app.service('Tab', function($http){
	
	
    this.toLog = function(data){
		
		var hold = "";
		
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
			  hold = data;
			  console.log('tabs working');
			  console.log(data);
			  
			})
			//there was an error sending the data to php.//
			.error(function (data, status, headers, config)
			{
					console.log("CONNECTIVITY ERROR");
			});
			
			this.mytabs = hold;
		};
		///////////////////////////////////////////////////////////////////////////////////////////////////
		
	
     
});


}(angular));// JavaScript Document