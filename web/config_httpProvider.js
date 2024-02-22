
invApp.config(['$httpProvider', function($httpProvider) {
	$httpProvider.defaults.headers.common["FROM-ANGULAR"] = "true";
}]);