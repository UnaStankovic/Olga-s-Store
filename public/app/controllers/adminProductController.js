angular.module("Store").controller('aProductController', function($scope, $http, $rootScope){
  /*This controller is being used on Admin panel page for adding new products*/
  $scope.product = {};
  $scope.AddProduct = function(){
    $http.post('../api/products', $scope.product)
      .then(function(response) {
        if(response.data.status == "error"){
          $scope.product.errormsg_product = response.data.message;
        //  console.log($scope.product.errormsg_product);
        }
        else {
          $scope.product = response.data;
          $scope.product.successmsg_product = "Successfully added";
        //  console.log($scope.product);
        }
    });
  }

  $scope.ChangeProduct = function(){
    $http.post('../api/products', $scope.product)
      .then(function(response) {
        if(response.data.status == "error"){
          $scope.product.errormsg_product = response.data.message;
        //  console.log($scope.product.errormsg_product);
        }
        else {
          $scope.product = response.data;
          $scope.product.successmsg_product = "Successfully added";
        //  console.log($scope.product);
        }
    });
  }

});
