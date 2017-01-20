angular.module("Store").controller('aCategoryController', function($scope, $http, $rootScope){
  /*This controller is being used on Admin panel page for adding and removing categories*/
  $scope.info = {};
  $scope.AddCategory = function(){
    $http.post('../api/category',$scope.info)
   .then(function(response) {
      if(response.data.status == "error"){
        $scope.info.errormsg = response.data.message;
      }
       else {
         $scope.info.successmsg = "Successfully added";
       }
   });
 }
 $scope.RemoveCategory = function(){
   $http.delete('../api/category/' + $scope.info.category.id,$scope.info)
  .then(function(response) {
     if(response.data.status == "error"){
       $scope.info.errormsg = response.data.message;
       console.log($scope.info.errormsg);
     }
      else {
        $scope.info.successmsg = "Successfully removed";
        console.log($scope.info.successmsg);
      }
  });
}


});
