app.controller('TenanciesCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});