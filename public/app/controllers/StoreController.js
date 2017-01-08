angular.module("Store").controller('StoreController', function($scope, $http, $routeParams){
    $scope.product = {};
    $scope.categoryid = $routeParams.categoryid;

    $http.get('../api/product/2')
      .then(function(response) {
        if(response.data.status == 'error'){
          console.log(response.data);
          $scope.product.errormsg = response.data.message;
        }
        else {
          $scope.product = response.data.product;
        }
      });
});
