angular.module("Store").directive('product', function() {
  return {
    restrict: 'E',
    scope: {
      tmp: '=prodid',
      selectedProduct: '=selprod'
    },
    templateUrl: '../app/directives/product.html'
  }
});
