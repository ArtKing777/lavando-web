app.controller('FaqsCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});