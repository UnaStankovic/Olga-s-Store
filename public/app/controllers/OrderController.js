angular.module("Store").controller('orderController', function($scope, $http, $rootScope){
  /*This controller is being used on various pages for listing orders of user and for listing orders in admin panel*/
  $scope.orderinfo = {};
  $scope.getOrders = function(){
    $http.get('../api/order')
      .then(function(response) {
        $scope.orderinfo = response.data.orders;
        $scope.orderinfo.map(function(order, index) {
          $http.get('../api/order/' + order.id).then(function(response) {
            $scope.orderinfo[index].products = response.data.order.products;
          });
        });
      });
    }
});
