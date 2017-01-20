angular.module("Store").controller('MSUserController', function($scope, $http, $rootScope){
  /*This controller is being used on Admin panel page for changing users who have for example inappropriate names or so*/
  $scope.info = {};
  $scope.searchUser= function(){
    var query_string;
    if($scope.info.field.indexOf('@') != -1)
      query_string = "email=";
    else
      query_string = "id=";

    $http.get('../api/search/user?' + query_string + $scope.info.field)
      .then(function(response) {
        if(response.data.status == 'success'){
          $scope.info = response.data.user;
        }
        else{
          $scope.info.errormsg = response.data.message;
        }
      });
  };
  $scope.changeUInfo = function(){
    $http.put('../api/user/' + $scope.info.id, $scope.info)
    .then(function(response){
      if(response.data.status == 'success'){
        $scope.info = response.data.user;
        $scope.info.successmsg = 'User info successfully changed.';
      }
      else{
        $scope.info.errormsg1 = response.data.message;
      }
    });
  };
});
