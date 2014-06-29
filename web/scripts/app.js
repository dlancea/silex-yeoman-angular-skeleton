'use strict';

angular
	.module('appNameApp', [
		'ngCookies',
		'ngResource',
		'ngSanitize',
		'ngRoute'
	])
	.config(function ($routeProvider, $locationProvider) {
		$routeProvider
			.when('/', {
				templateUrl: 'content.html',
				controller: 'ContentCtrl'
			})
			.otherwise({
				redirectTo: '/'
			});

//		$locationProvider.html5Mode(true)
	});
