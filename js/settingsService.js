// JavaScript Document// JavaScript Document


/*global angular, Recaptcha */
(function (ng) {
    'use strict';

    ng.module('settingsService', []);

}(angular));

/*global angular */
(function (ng) {
    'use strict';

    var app = ng.module('settingsService');

    /**
     * An angular service to wrap the reCaptcha API
     */
	app.service('Settings', function($http){
		
	this.mysettings = '';
		
	this.count = function(){this.settingsAval = 8 - this.mysettings.length; console.log("num of setting " + this.settingsAval);};
	
	
	
     
});


}(angular));// JavaScript Document// JavaScript Document