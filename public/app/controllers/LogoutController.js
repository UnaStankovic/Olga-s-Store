angular.module("Store").controller('LogoutController', function($scope, $http, $location,$window){
    $scope.logout = function(){
      $http.get('../api/logout')
      .then(function(response) {
        $window.location.reload();
        $location.path("/");
      });
    };
});
