angular.module('app.directives.confirmPassword', [])
	.directive('confirmPassword', function() {
		return {
			require: 'ngModel',
			restrict: 'A',
			link: function(scope, element, attrs, ctrl) {
				scope.$watch(attrs.ngModel, function(viewValue) {
					if (scope.form.password.$viewValue !== undefined) {
						if (viewValue !== scope.form.password.$viewValue) {
							ctrl.$setValidity('missMatch', false);
						} else {
							ctrl.$setValidity('missMatch', true);
						}
					}
				});
			}
		};
	});