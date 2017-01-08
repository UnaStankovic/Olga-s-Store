angular.module("Store").controller('UserController', function($scope, $http, $rootScope){
  $scope.info = {};
  $http.get('../api/user/' + $rootScope.userid)
    .then(function(response) {
      $scope.info = response.data.user;
    });
});
