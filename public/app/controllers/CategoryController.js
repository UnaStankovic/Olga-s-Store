angular.module('Store').controller('CategoryController', function($rootScope, $http) {
  $http.get('../api/category')
    .then(function(response) {
      $rootScope.categories = response.data.categories;
      $rootScope.categories.unshift({
        id : 'allproducts',
        name : 'Svi proizvodi'
      });
      console.log($rootScope.categories);
    });
});
