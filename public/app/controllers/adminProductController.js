angular.module('Store').directive('fileModel', ['$parse', function ($parse) {
  return {
    restrict: 'A',
    link: function(scope, element, attrs) {
      var model = $parse(attrs.fileModel);
      var modelSetter = model.assign;

      element.bind('change', function(){
        scope.$apply(function(){
          modelSetter(scope, element[0].files[0]);
        });
      });
    }
  };
}]);

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
          $scope.product = response.data.product;

          var fd = new FormData();
          fd.append('image', $scope.image);
          $http.post("../" + $scope.product.images, fd, {
                  transformRequest: angular.identity,
                  headers: {'Content-Type': undefined}
               })
            .then(function(secondresponse){
              if(secondresponse.data.status == 'error'){
                $scope.product.errormsg_product = secondresponse.data.message;
              }
              else {
              //  console.log(secondresponse.data.message);
              }
            });
          $scope.product.successmsg_product = "Successfully added";
        // console.log($scope.product);
        }
    });
  }

  $scope.searchProduct = function(){
  //  console.log($scope.product.id);
    $http.get('../api/products/' + $scope.product.id)
      .then(function(response) {
        if(response.data.status == 'success'){
          $scope.product = response.data.product;
        //  console.log($scope.product);
        }
        else{
          $scope.product.errormsg_searchproduct = response.data.message;
          //  console.log($scope.product.errormsg_searchproduct);
        }
      });
  };
  $scope.ChangeProduct = function(){
    $http.put('../api/products/' + $scope.product.id, $scope.product)
      .then(function(response) {
        if(response.data.status == "error"){
          $scope.product.errormsg_chproduct = response.data.message;
          //console.log($scope.product.errormsg_chproduct);
        }
        else {
          $scope.product = response.data.product;
          $scope.product.successmsg_chproduct = "Successfully changed";
        //  console.log($scope.product);
        }
    });
  }

});
