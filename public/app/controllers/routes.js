angular.module("Store")
  .config(function($routeProvider, $locationProvider){
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
    .when('/catalogue/:categoryid',{
      templateUrl: '../views/catalogue.html'
    })
    .when('/login',{
      templateUrl: '../views/login.html'
    })
    .when('/register',{
      templateUrl: '../views/register.html'
    })
    .when('/myaccount',{
      templateUrl: '../views/myaccount.html'
    })
    .when('/shoppingCart',{
      templateUrl: '../views/shoppingCart.html'
    })
    .otherwise({
      redirectTo: '/'
    });
  });
