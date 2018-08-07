app.controller('NewsCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});