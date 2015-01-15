
var app = angular.module('app', ['app.directives.confirmPassword']);

/**
*	This Controller will be finished once someone implements UI-Bootstrap
*		
*	UI-Bootstrap can be found @http://angular-ui.github.io/bootstrap/
*/


// Controller gets json data from /request/api/users/json
app.controller("PostsCtrl", function($scope, $http) {

	$http.get('/request/api/users/json').then(function(res) {
		// Test
		$scope.posts = res.data; 
	});
});