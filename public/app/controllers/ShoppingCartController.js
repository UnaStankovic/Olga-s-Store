angular.module('Store').controller('ShoppingCartController', function($scope, $http, shoppingCart) {
    $scope.shoppingCart = shoppingCart.getProducts(); //reference only
    $scope.shoppingCartService = shoppingCart;
});