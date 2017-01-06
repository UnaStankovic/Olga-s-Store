/*This piece of code is what yet should be done.*/
angular.module("Store")
.factory("User", function UserFactory($http){
  return{
    all: function(){
      return $http({method : "GET", url :'../api/logout'});
    },
    create : function(info){
      return $http({ method : "POST", url : '../api/login', data : info});
    }
  }
});
