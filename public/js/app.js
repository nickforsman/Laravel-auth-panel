
var app = angular.module('app', ['app.directives.confirmPassword']);

// Controller gets json data from /request-users route
app.controller("PostsCtrl", function($scope, $http) {
	$http.get('/request-users').then(function(res) {
		$scope.posts = res.data;
		console.log(res.data);
	});
});