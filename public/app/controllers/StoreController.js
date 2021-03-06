angular.module("Store").controller('StoreController', function($scope, $http, $routeParams, $rootScope, shoppingCart){
  $scope.products = {};
  $scope.pages = [];
  $scope.Math = window.Math;
  $rootScope.selectedProduct = 10;
  $scope.shoppingCart = shoppingCart;

  $scope.range = function(min, max) {
      var arr = [];
      for(var i = min; i < max; i++)
          arr.push(i);
      return arr;
  }

  $scope.toggleShoppingCart = function(product) {
      if(shoppingCart.find(product.id)) {
          shoppingCart.remove(product.id);
      }
      else {
          shoppingCart.add(product);
      }
  };

  $scope.initializePageIndexes = function(response) {
    var numOfPages = Math.ceil(response.data.count * 1.0 / response.data.pageSize);

    if($scope.pageid <= 4) {
      for(var j = 1; j <= 5 && j <= numOfPages; j++) {
        $scope.pages.push(j);
      }
    } else {
      for(var j = $scope.pageid - 2; j <= $scope.pageid + 2 && j <= numOfPages; j++) {
        $scope.pages.push(j);
      }
    }
  };

  $rootScope.loadProducts = function() {
    $scope.pageid = (typeof $routeParams.pageid == "undefined") ? "1" : $routeParams.pageid;
    $scope.categoryid = 0;

    for(var i = 0; i < $rootScope.categories.length; i++)
      if($routeParams.categoryid == $rootScope.categories[i].id)
        $scope.categoryid = i;

    if($scope.categoryid == 0) {
      $http.get('../api/products?page=' + $scope.pageid)
        .then(function(response) {
          if(response.data.status == 'error'){
            $scope.errormsg = response.data.message;
          }
          else {
            $scope.products = response.data.products;
            //  console.log($scope.products);

            $scope.initializePageIndexes(response);

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

            $scope.initializePageIndexes(response);

            for(var i = 0; i < $scope.products.length; i++)
              $scope.products[i].imgs = $scope.products[i].images;
		            //	console.log($scope.products);
          }
        });
    }
  };

  if($rootScope.categoryLoaded == true)
    $rootScope.loadProducts();
});
