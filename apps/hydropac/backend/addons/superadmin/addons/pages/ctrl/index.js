app.controller('PagesCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});