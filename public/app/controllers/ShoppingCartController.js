angular.module('Store').controller('ShoppingCartController', function($scope, $http, shoppingCart) {
    $scope.shoppingCart = shoppingCart.getProducts(); //reference only
    $scope.shoppingCartService = shoppingCart;

    $scope.submit = function() {
        var data = {User_id : $scope.userid};
        data.contains = [];
        for(pid in $scope.shoppingCart)
            data.contains.push({Product_id : $scope.shoppingCart[pid].id, quantity : $scope.shoppingCart[pid].quantity});

        $http.post('../api/order', data).then(function(response) {
            if(response.data.status == 'success') {
                $scope.shoppingCart = [];
                shoppingCart.checkedProducts = [];
            }
        });
    };
});