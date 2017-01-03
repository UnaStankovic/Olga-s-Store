angular.module("Store").controller('RegisterController', function($scope, $http){
  $scope.info = {};
  $scope.registerUser = function() {
    console.log($scope.info);
    $http.post('../api/login',$scope.info)
   .then(function(response) {
       if(response.data.status == "error"){
        $scope.info.errormsg = response.data.message;
        console.log("Error on logging in: " + response.data.message);
      }
       else {
         console.log("Successfully logged in.");
       }
   });
  };
});
