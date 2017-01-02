angular.module('PageSwitcher')
  .config(function($routeProvider){
    $routeProvider.when('/',{
      templateUrl: '../views/mainpage.html'
    })
    .when('/onama',{
      templateUrl: '../views/onama.html'
    })
  });
