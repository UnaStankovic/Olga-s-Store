angular.module("Store").controller('ChangeinfoController', function($scope, $http, $rootScope){
  $scope.$parent.info = {};

  $http.get('../api/user/' + $rootScope.userid)
    .then(function(response) {
      $scope.$parent.info = response.data.user;
    });

  $scope.$parent.changeInfo = function(){
    console.log("ok");
    $http.put('../api/user/' + $rootScope.userid, $scope.$parent.info)
    .then(function(response){
      if(response.data.status = 'success'){
        $scope.$parent.info = response.data.user;
        //console.log(response.data);
      }
      else{
        console.log('Error : ' + response.data.message);
      }
    });
  };
});
