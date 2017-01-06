angular.module("Store").controller('LogoutController', function($scope, $http, $location,$window, User){
    $scope.logout = function(){
      $http.get('../api/logout')
      .then(function(response) {
        $window.location.reload(true); //This should be removed soon.
        $scope.isLoggedIn = false;
        $location.path("/");
      });
    };
});
