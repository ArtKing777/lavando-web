app.controller('UsersCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});