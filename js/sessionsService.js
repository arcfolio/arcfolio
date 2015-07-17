// JavaScript Document


/*global angular, Recaptcha */
(function (ng) {
    'use strict';

    ng.module('sessionService', []);

}(angular));

/*global angular */
(function (ng) {
    'use strict';

    var app = ng.module('sessionService');

    /**
     * An angular service to wrap the reCaptcha API
     */
	app.service('Session', function(){
	
    this.login = function(data){
		this.id = data.id;
		this.email = data.email;
		this.password = data.password;
		this.company = data.company;
		this.mainimg = data.mainimg;
    }; 
	
	this.isLoggedIn = function() {
		if(this.email != null && this.password != null){return true;}else{return false}
	};
	
	this.isCompany = function() {
		if(this.company != ""){	return true;	}else{	return false;	}
	};
	
	
});


}(angular));