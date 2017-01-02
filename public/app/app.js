
	var app = angular.module("PageSwitcher",['ngRoute']);

	app.config(function($routeProvider, $locationProvider){
	    $locationProvider.hashPrefix('');
			$routeProvider
			.when('/',{
	      templateUrl: '../views/mainpage.html'
	    })
	    .when('/about',{
	      templateUrl: '../views/about.html'
	    })
			.when('/history',{
				templateUrl: '../views/history.html'
			})
			.when('/contact',{
				templateUrl: '../views/contact.html'
			})
			.when('/catalogue',{
				templateUrl: '../views/catalogue.html'
			})
			.when('/basket',{
				templateUrl: '../views/basket.html'
			})
			.otherwise({
				redirectTo: '/'
			});
	  });
