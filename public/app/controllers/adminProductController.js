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

  $scope.searchProduct = function(){
    $http.get('../api/products/' + $scope.product.id)
      .then(function(response) {
        if(response.data.status == 'success'){
          $scope.product = response.data.user;
          console.log($scope.product);
        }
        else{
          $scope.product.errormsg_searchproduct = response.data.message;
            console.log($scope.product.errormsg_searchproduct);
        }
      });
  };
  $scope.ChangeProduct = function(){
    $http.put('../api/products/', + $scope.product.id, $scope.info)
      .then(function(response) {
        if(response.data.status == "error"){
          $scope.product.errormsg_chproduct = response.data.message;
          console.log($scope.product.errormsg_chproduct);
        }
        else {
          $scope.product = response.data;
          $scope.product.successmsg_chproduct = "Successfully changed";
        //  console.log($scope.product);
        }
    });
  }

});
