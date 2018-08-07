app.controller('PropertiesCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});