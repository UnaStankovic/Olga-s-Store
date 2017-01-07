angular.module("Store").controller('LoginController', function($scope, $http, $location,$window,$rootScope){
  $scope.info = {};
  $scope.loginUser = function() {
    console.log($scope.info);
    $http.post('../api/login',$scope.info)
   .then(function(response) {
       if(response.data.status == "error"){
        $scope.info.errormsg = response.data.message ;
        console.log("Error on logging in: " + response.data.message);
      }
       else {
         console.log("Successfully logged in.");
         $rootScope.loggedin = true;
        // $window.location.reload(true);  //This should be removed soon.
         $location.path('/myaccount');
       }
   });
  };
});
/*
angular.module("Store").controller('LoginController', function($scope, $http, $location,$window,User){
  $scope.loginUser = function() {
    console.log($scope.info);
  //  $http.post('../api/login',$scope.info)
  User.all()
   .success(function(response) {
       if(response.data.status == "error"){
        $scope.info.errormsg = response.data.message ;
        console.log("Error on logging in: " + response.data.message);
      }
       else {
         console.log("Successfully logged in.");
        // $window.location.reload(true);  //This should be removed soon.
         $location.path('/myaccount');
       }
   });
  };
});
*/
