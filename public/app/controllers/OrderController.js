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

  $scope.changeStatus = function(orderid, status){
    $http.put('../api/order/' + orderid, {status : status})
      .then(function(response){
        console.log(response.data);
        for(var i = 0; i < $scope.orderinfo.length; i++) {
          if($scope.orderinfo[i].id == orderid) {
            $scope.orderinfo[i].status = response.data.order.status;
            break;
          }
        }
      });
  }

});
