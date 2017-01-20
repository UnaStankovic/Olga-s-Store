angular.module("Store").controller('UserController', function($scope, $http, $rootScope){
  /*This controller is being used on various pages such as myaccount and shoppingCart page for fetching user info*/
  $scope.info = {};
  $http.get('../api/user/' + $rootScope.userid)
    .then(function(response) {
      $scope.info = response.data.user;
    });

});
