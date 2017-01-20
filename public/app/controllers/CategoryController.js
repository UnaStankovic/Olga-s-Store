angular.module('Store').controller('CategoryController', function($rootScope, $http) {
  /*This controller is being used for mainly 2 purposes:
      1. ng repeating categories when we need them to be listed as pages
      2. choosing category when we add new product*/
  $http.get('../api/category')
    .then(function(response) {
      $rootScope.categories = response.data.categories;
      $rootScope.categoryLoaded = true;
      $rootScope.categories.unshift({
        id : 0,
        name : 'Svi proizvodi'
      });

      if($rootScope.loadProducts != null)
        $rootScope.loadProducts();
    });
});
