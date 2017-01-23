angular.module('Store').filter('totalPrice', function() {
    return function(products) {
        var total = 0;
        for(var i = 0; i < products.length; i++)
            total += products[i].price_per_piece * products[i].quantity;
        return total;
    }
});