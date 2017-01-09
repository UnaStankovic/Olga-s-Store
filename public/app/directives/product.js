angular.module("Store").directive('product', function() {
  return {
    restrict: '',
    template: '<div class = "col-sm-6">\
              <h1 class = "maintitle">{{categories[categoryid].name}}</h1>\
              <div>\
                <div class = "well well-sm">\
                  <h2 class = "color-it-gray">{{product.name}}</h2>\
                  <img ng-src ="{{\'../app/assets\' + product.images[0].path}}" alt = "productpic" id = "logo">\
                  <p>{{product.errormsg}}</p>\
                <p class = "right-it">\
                  <button type = "submit" class = "btn btn-primary" data-title="Edit" data-toggle="modal" data-target="#moreinfo">\
                    <span class="glyphicon glyphicon-ok-sign"></span>Saznaj više\
                  </button>\
                </p>\
              </div>',
  }
});
