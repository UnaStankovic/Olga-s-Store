angular.module('Store').controller('CategoryController', function($rootScope, $http) {
  $http.get('../api/category')
    .then(function(response) {
      $rootScope.categories = response.data.categories;
      $rootScope.categoryLoaded = true;
      $rootScope.categories.unshift({
        id : 0,
        name : 'Svi proizvodi'
      });

      $rootScope.loadProducts();
      //console.log($rootScope.categories);
    });
});
