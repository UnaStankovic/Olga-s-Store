angular.module("Store").controller('LogoutController', function($scope, $http, $location,$window, $rootScope){
    $scope.logout = function(){
      $http.get('../api/logout')
      .then(function(response) {
        $rootScope.loggedin = false;
        $rootScope.userid = -1;
        $location.path("/");
      });
    };
});
