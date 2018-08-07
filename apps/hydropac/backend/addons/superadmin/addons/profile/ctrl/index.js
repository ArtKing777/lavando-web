app.controller('ProfileCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});