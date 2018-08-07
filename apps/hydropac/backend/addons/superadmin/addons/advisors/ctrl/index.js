app.controller('AdvisorsCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});