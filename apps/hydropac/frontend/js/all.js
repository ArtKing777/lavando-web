app.controller('CarouselDemoCtrl', function ($scope) {

$scope.myInterval = 5000;
  $scope.noWrapSlides = false;
  $scope.active = 0;
  var slides = $scope.slides = [];
        slides.push({id:1, image: $scope.app.appConfig.templatePath.frontend + 'images/slider/slider01.jpg'});	  
        slides.push({id:2, image: $scope.app.appConfig.templatePath.frontend + 'images/slider/slider01.jpg'});
        slides.push({id:3, image: $scope.app.appConfig.templatePath.frontend + 'images/slider/slider01.jpg'});
});

/*
// Define app module
angular
    .module('myApp', ['angular-owl-carousel']);
*/

// Create controller
app.controller('MyController', MyController);

function MyController() {
    this.owl = {
        items: ["item 1", "item 2"],
        options: {
            loop: true,
            nav: false
        }
    };
}


app.directive('setClassWhenAtTop', function ($window) {
  var $win = angular.element($window); // wrap window object as jQuery object

  return {
    restrict: 'A',
    link: function (scope, element, attrs) {
      var topClass = attrs.setClassWhenAtTop, // get CSS class from directive's attribute value
          offsetTop = element.offset().top; // get element's offset top relative to document

      $win.on('scroll', function (e) {
        if ($win.scrollTop() >= offsetTop) {
          element.addClass(topClass);
        } else {
          element.removeClass(topClass);
        }
      });
    }
  };
});