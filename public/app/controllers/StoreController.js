angular.module("Store").controller('StoreController', function($scope, $http, $location){
      $http.get('../api/product/2')
      .then(function(response) {
        console.log(response.data);
      });
});
