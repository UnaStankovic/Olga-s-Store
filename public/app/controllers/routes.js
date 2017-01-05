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
    .when('/catalogue',{
      templateUrl: '../views/catalogue.html'
    })
    .when('/oldmoney',{
      templateUrl: '../views/oldmoney.html'
    })
    .when('/ceramics',{
      templateUrl: '../views/ceramics.html'
    })
    .when('/stamps',{
      templateUrl: '../views/stamps.html'
    })
    .when('/postcards',{
      templateUrl: '../views/postcards.html'
    })
    .when('/otherproducts',{
      templateUrl: '../views/otherproducts.html'
    })
    .when('/basket',{
      templateUrl: '../views/basket.html'
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
    .otherwise({
      redirectTo: '/'
    });
  });
