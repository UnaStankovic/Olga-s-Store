angular.module('Store').service('shoppingCart', function() {
    this.shoppingCart = this.shoppingCart || [];

    this.isEmpty = function() {
        if(this.shoppingCart.length == 0)
            return true;
        return false;
    };

    this.add = function(product) {
        var obj = {
            id : product.id,
            price_per_piece : product.price_per_piece,
            name : product.name,
            quantity : 1
        };

        this.shoppingCart.push(obj);
    };

    this.remove = function(productId) {
        for(var i = 0; i < this.shoppingCart.length; i++) {
            if(this.shoppingCart[i].id == productId) {
                this.shoppingCart.splice(i, 1);
                break;
            }
        }
    };

    this.find = function(productId) {
        for(var i = 0; i < this.shoppingCart.length; i++)
            if(this.shoppingCart[i].id == productId)
                return true;
        return false;
    };

    this.getProducts = function() {
        return this.shoppingCart;
    };
});