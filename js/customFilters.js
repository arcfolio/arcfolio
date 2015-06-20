// JavaScript Document

angular.module('arcfolioFilters', []).filter('pictyperemover', function() {
  return function(input) {
    	var mystring = input;
		mystring.replace('.jpeg', '');
		mystring.replace('.jpg', '');
		mystring.replace('.png', '');
		mystring.replace('.gif', '');
		
		return mystring;
  };
});