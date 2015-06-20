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
		
	this.mytabs = '';
		
	this.count = function(){this.tabsAval = 8 - this.mytabs.length; console.log("num of tabs " + this.tabsAval);};
	
	this.fillTabs = function(id)
	{
		var count = this.mytabs.length+1;
		while(count < 9)
		{
			this.mytabs.push({'deleted' : 0, 'lastUpdated' : null, 'name' : 'tab #'+count , 'ownerId' : id, 'real': false, 'id': null });
			count++;
		};
		console.log(this.mytabs);
	};
	
	
     
});


}(angular));// JavaScript Document