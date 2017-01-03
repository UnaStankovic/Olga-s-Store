angular.module("Store").controller('LogoutController', function($scope, $http, $location){
    $scope.logout = function(){
      $http.get('../api/logout')
      .then(function(response) {
        $location.path("/");
      });
    };
});
