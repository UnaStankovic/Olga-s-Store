angular.module("Store").controller('StoreController', function($scope, $http, $routeParams){
  $scope.product = {};
  $scope.categoryid = $routeParams.categoryid;

  $http.get('../api/products/29')
    .then(function(response) {
      if(response.data.status == 'error'){
        console.log(response.data);
        $scope.product.errormsg = response.data.message;
      }
      else {
        $scope.product = response.data.product;
        $http.get('../' + $scope.product.images)
          .then(function(response) {
            if(response.data.status == 'error'){
              console.log(response.data);
              $scope.product.errormsg = response.data.message;
            }
            else {
              $scope.product.images = response.data.images;
              console.log($scope.product);
            }
          });
      }
    });
});
