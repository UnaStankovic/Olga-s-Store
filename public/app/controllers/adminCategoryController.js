angular.module("Store").controller('aCategoryController', function($scope, $http, $rootScope){
  /*This controller is being used on Admin panel page for adding and removing categories*/
  $scope.catinfo = {};
  $scope.AddCategory = function(){
    $http.post('../api/category',$scope.catinfo)
      .then(function(response) {
        if(response.data.status == "error"){
          $scope.catinfo.errormsg = response.data.message;
        }
        else {
          $scope.catinfo = response.data.category;
          $rootScope.categories.push(response.data.category);
          //console.log($scope.catinfo);
          $scope.catinfo.successmsg = "Successfully added";
        }
    });
  }

  $scope.RemoveCategory = function(){
    $http.delete('../api/category/' + $scope.selectedCategory)
      .then(function(response) {
        if(response.data.status == "error"){
          $scope.catinfo.errormsg2 = response.data.message;
        }
        else {
          for(var i = 0; i < $rootScope.categories.length; i++)
            if($rootScope.categories[i].id == $scope.selectedCategory) {
              $rootScope.categories.splice(i, 1);
              break;
            }
          $scope.catinfo.successmsg2 = "Successfully removed";
        }
    });
  }

});
