angular.module("Store").controller('StoreController', function($scope, $http, $routeParams, $rootScope){
  $scope.products = {};

  $rootScope.loadProducts = function() {
    $scope.pageid = (typeof $routeParams.pageid == "undefined") ? "1" : $routeParams.pageid;
    $scope.categoryid = 0;
    for(var i = 0; i < $rootScope.categories.length; i++)
      if($routeParams.categoryid == $rootScope.categories[i].id)
        $scope.categoryid = $routeParams.categoryid;

    if($scope.categoryid == 0) {
      $http.get('../api/products?page=' + $scope.pageid)
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
    } else {
      $http.get('../api/search/category?id=' + $rootScope.categories[$scope.categoryid].id + "&page=" + $scope.pageid)
        .then(function(response) {
          if(response.data.status == 'error') {
            // :/
          } else {
            $scope.products = response.data.products;
            for(var i = 0; i < $scope.products.length; i++)
              $scope.products[i].imgs = $scope.products[i].images;
          }
        });
    }
  };

  if($rootScope.categoryLoaded == true)
    $rootScope.loadProducts();
});
