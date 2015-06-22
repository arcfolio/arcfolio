// JavaScript Document


/*global angular, Recaptcha */
(function (ng) {
    'use strict';

    ng.module('imgService', []);

}(angular));

/*global angular */
(function (ng) {
    'use strict';

    var app = ng.module('imgService');

    /**
     * An angular service to wrap the reCaptcha API
     */
	app.service('Img', function($http){
		
	this.myimgs = '';
		
	this.count = function(){this.imgsAval = 8 - this.myimgs.length; console.log("num of img " + this.imgsAval);};
	
	
	
     
});


}(angular));// JavaScript Document// JavaScript Document