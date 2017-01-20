angular.module("Store").controller('ChangeinfoController', function($scope, $http, $rootScope){
  $scope.$parent.info = {};
/*This controller is used by user to change HIS OWN data */
  $http.get('../api/user/' + $rootScope.userid)
    .then(function(response) {
      $scope.$parent.info = response.data.user;
    });

  $scope.$parent.changeInfo = function(){
    $http.put('../api/user/' + $rootScope.userid, $scope.$parent.info)
    .then(function(response){
      if(response.data.status == 'success'){
        $scope.$parent.info = response.data.user;
      }
      else{
        $scope.info.errormsg = response.data.message;
        //console.log('Error : ' + response.data.message);
      }
    });
  };
});
