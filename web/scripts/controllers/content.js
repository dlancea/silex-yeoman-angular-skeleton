'use strict';

angular.module('appNameApp').controller('ContentCtrl', function ($scope, $window) {

	if($window.init_data)
		$scope.data = $window.init_data;
	else
		$scope.data = [];

});
