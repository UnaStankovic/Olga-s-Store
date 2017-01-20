angular.module("Store").controller('RegisterController', function($scope, $http,$location, $rootScope){
  $scope.info = {};
  $scope.registerUser = function() {
    console.log($scope.info);
    delete $scope.info.errormsg;
    $http.post('../api/register',$scope.info)
   .then(function(response) {
      if(response.data.status == "error"){
        $scope.info.errormsg = response.data.message;
        //console.log("Error on registering: " + response.data.message);
      }
       else {
        // console.log("Successfully registered.");
         $location.path('/login');
       }
   });
  };
});
