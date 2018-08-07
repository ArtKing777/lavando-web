app.controller('TestimonialsCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});