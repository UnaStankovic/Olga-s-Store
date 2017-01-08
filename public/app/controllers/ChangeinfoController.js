angular.module("Store").controller('ChangeinfoController', function($scope, $http, $rootScope){
  $scope.info = {};
  $http.get('../api/user/' + $rootScope.userid)
    .then(function(response) {
      $scope.info = response.data.user;
    });
  $scope.changeInfo = function(){
    $http.put('../api/user/' + $rootScope.userid, $scope.info)
    .then(function(response){
      if(response.data.status = 'success'){
        $scope.info = response.data.user;
        console.log(response.data);
      }
      else{
        console.log('Error : ' + response.data.message);
      }
    });
  };
});
