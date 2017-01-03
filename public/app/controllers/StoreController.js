angular.module("Store").controller('StoreController', function($scope, $http,$routeParams){
  var controller = this;
  $http({
    method : 'GET', url : '/catalogue/' + $routeParams.id})
  .success(function(data){
    controller.product = data;
  })
});
