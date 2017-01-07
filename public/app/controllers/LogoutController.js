angular.module("Store").controller('LogoutController', function($scope, $http, $location,$window, User, $rootScope){
    $scope.logout = function(){
      $http.get('../api/logout')
      .then(function(response) {
        //$window.location.reload(true); //This should be removed soon.
        $rootScope.loggedin = false;
        $location.path("/");
      });
    };
});
