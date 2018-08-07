app.controller('CourseCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});