app.service("ProductsService", function($http, $q){
  var deffered = $q.defer();
  $http.get('../api/product/').then(function(data)
  {
    deffered.resolve(data);
  });
  this.getProducts = function()
  {
    return deffered.promise;
  }
})

.controller("ProductsController", function($scope, ProductsService))
{
  var promise = ProductsService.getProducts();
  promise.then(function(data)
  {
    $scope.products = data;
    console.log($scope.products);
  });
}
