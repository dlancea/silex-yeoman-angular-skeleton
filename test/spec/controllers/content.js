'use strict';

// Set init data global
window.init_data = ['test', 'data'];

describe('Controller: ContentCtrl', function () {

	// load the controller's module
	beforeEach(module('appNameApp'));

	var MainCtrl,
		scope;

	// Initialize the controller and a mock scope
	beforeEach(inject(function ($controller, $rootScope) {
		scope = $rootScope.$new();
		MainCtrl = $controller('ContentCtrl', {
			$scope: scope
		});
	}));

	it('should attach data to the scope', function () {
		expect(scope.data.length).toBe(2);
	});
});
