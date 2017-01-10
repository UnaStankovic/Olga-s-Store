angular.module("Store").controller('StoreController', function($scope, $http, $routeParams){
  $scope.products = {};
  $scope.categoryid = $routeParams.categoryid;

  $http.get('../api/products?page=3')
    .then(function(response) {
      if(response.data.status == 'error'){
        $scope.errormsg = response.data.message;
      }
      else {
        $scope.products = response.data.products;
        $scope.products.forEach(function(curvalue, i){
          $http.get('../' + $scope.products[i].images)
            .then(function(response) {
              if(response.data.status == 'error'){
                $scope.errormsg = response.data.message;
              }
              else {
                $scope.products[i].imgs = response.data.images;
              }
            });
        });
      }
    });
});
