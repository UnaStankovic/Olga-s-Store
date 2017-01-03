angular.module("Store").controller('LoginController', function($http){
  this.info = {};
  this.loginUser = function() {
    console.log(this.info);
    $http.post('../api/login',this.info)
   .then(function(response) {
       if(response.data.status == "error")
        console.log("Error on logging in: " + response.data.message);
       else {
         console.log("Successfully logged in.");
       }
   });
  };
});
